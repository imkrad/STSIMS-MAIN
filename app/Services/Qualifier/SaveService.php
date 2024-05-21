<?php

namespace App\Services\Qualifier;

use App\Models\{
    Qualifier,
    QualifierAddress,
    QualifierProfile,
    ListStatus,
    ListProgram,
    LocationMunicipality,
    LocationProvince,
    LocationRegion,
    LocationBarangay,
};
use App\Imports\QualifierImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\Qualifier\IndexResource;

class SaveService
{
    public static function preview($request){
        $data =  Excel::toCollection(new QualifierImport,$request->import_file);
        $rows = $data[0];

        foreach($rows as $row){ 
            if($row[1] != ''){

                $count = substr_count($row[5],'*');

                $birthday = ($row[8] - 25569) * 86400;
                $birthday = 25569 + ($birthday / 86400);
                $birthday = ($birthday - 25569) * 86400;
                $birthday = gmdate("Y-m-d", $birthday);

                if($count == 2){
                    $status = 20;
                }else if($count == 1){
                    $status = 19;
                }else{
                    $status = 18;
                }

                $middlename = str_replace("*","",$row[5]);

                $information[] = [
                    'spas_id' => $row[0],
                    'firstname' => strtoupper(strtolower($row[4])),
                    'middlename' => strtoupper(strtolower($middlename)),
                    'lastname' => strtoupper(strtolower($row[3])),
                    'suffix' => strtoupper(strtolower($row[6])),
                    'sex' => $row[7],
                    'birthday' => $birthday,
                    'barangay' => strtoupper(strtolower($row[14])),
                    'municipality' => strtoupper(strtolower($row[15])),
                    'province' => strtoupper(strtolower($row[16])),
                    'region' => strtoupper(strtolower($row[19])),
                    'district' => strtoupper(strtolower($row[18])),
                    'zipcode' => strtoupper(strtolower($row[17])),
                    'hs_school' => strtoupper(strtolower($row[20])),
                    'email' => strtolower($row[9]),
                    'contact_no' => strtoupper(strtolower($row[10])),
                    'year_qualified' => 2023,
                    'program' => 'RA 7687',
                    'status' => $status,
                    'subprogram' => strtoupper(strtolower($row[2]))
                ];
            }
        }
        return $information;
    }

    public function upload($request){
        set_time_limit(0);
        $result = \DB::transaction(function () use ($request){
            $lists = $request->lists;
            $success = array();
            $failed = array();
            $duplicate = array();
            
            foreach($lists as $list){
                $count = Qualifier::where('spas_id',$list['spas_id'])->count();
                if($count == 0){
                    $qualifier = [
                        'spas_id' => $list['spas_id'],
                        'status_id' => $list['status'],
                        'status_type' => 14,
                        'program_id' => $this->program($list['program']),
                        'subprogram_id' => $this->program($list['subprogram']),
                        'qualified_year' => $list['year_qualified'],
                    ];

                    \DB::beginTransaction();
                    $qualifier_info = Qualifier::create($qualifier);
                    if($qualifier_info){
                        $profile = [
                            'qualifier_id' => $qualifier_info->id,
                            'email' => (filter_var($list['email'], FILTER_VALIDATE_EMAIL)) ? $list['email'] : NULL,
                            'firstname' => $list['firstname'],
                            'middlename' => $list['middlename'],
                            'lastname' => $list['lastname'],
                            'suffix' => $list['suffix'],
                            'birthday' => $list['birthday'],
                            'sex' => $list['sex'],
                            'contact_no' => $list['contact_no'],
                        ];
                        $profile_info = QualifierProfile::insertOrIgnore($profile);

                        if($profile_info){
                            $address = $this->address(
                                $list['region'],
                                $list['province'],
                                $list['municipality'],
                                $list['barangay'],
                                $list['district'],
                                $list['zipcode'],
                                $list['hs_school'],
                                $qualifier_info->id,
                            );
                            
                            $address_info = QualifierAddress::insertOrIgnore($address);
                            if($address_info){
                                array_push($success,$list['spas_id']);
                                \DB::commit();
                            }else{
                                array_push($failed,$list['spas_id']);
                                \DB::rollback();
                            }
                        }else{
                            array_push($failed,$list['spas_id']);
                            \DB::rollback();
                        }
                    }else{
                        array_push($failed,$list['spas_id']);
                        \DB::rollback();
                    }
                }else{
                    array_push($duplicate,$list['spas_id']);
                }
            }

            $result = [
                'success' => $success,
                'failed' => $failed,
                'duplicate' => $duplicate,
            ];

            return $result;
        });
        return $result;
    }

    public function program($name){
        $program = ListProgram::select('id')->where('name',$name)->first();
        $program_id = ($program) ? $program->id : '';
        return $program_id;
    }

    public function address($region,$province,$municipality,$barangay,$district,$zipcode,$hs_school,$id){
        switch($region){
            case '1':
                $region_code = '010000000';
            break;
            case '2':
                $region_code = '020000000';
            break;
            case '3':
                $region_code = '030000000';
            break;
            case '4a':
                $region_code = '040000000';
            break;
            case '4b':
                $region_code = '170000000';
            break;
            case '5':
                $region_code = '050000000';
            break;
            case '6':
                $region_code = '060000000';
            break;
            case '7':
                $region_code = '070000000';
            break;
            case '8':
                $region_code = '080000000';
            break;
            case '9':
                $region_code = '090000000';
            break;
            case '10':
                $region_code = '100000000';
            break;
            case '11':
                $region_code = '110000000';
            break;
            case '12':
                $region_code = '120000000';
            break;
            case 'NCR':
                $region_code = '13000000';
            break;
            case 'CAR':
                $region_code = '14000000';
            break;
            case 'ARMM':
                $region_code = '15000000';
            break;  
            case 'BARMM':
                $region_code = '15000000';
            break; 
            case 'CARAGA':
                $region_code = '16000000';
            break; 
        }

        $information = [
            'hs_school' => $hs_school,
            'barangay' => $barangay,
            'municipality' => $municipality,
            'province' => $province,
            'region' => $region,
            'district' => $district,
            'zipcode' => $zipcode,
        ];

        $is_completed = 0;

        if($province){
            $data = LocationProvince::with('region')
            ->where(function($query) use ($province) {  
                $query->where('name','LIKE', '%'.$province.'%');
            })->first();
            $province = $data->code;
            $region = $data->region->code;
        }
        if($municipality != null){
            $m = LocationMunicipality::where(function($query) use ($municipality) {  
                $query->where('name','LIKE', '%'.$municipality.'%');
            })
            ->when($province, function ($query, $province) {
                $query->whereHas('province',function ($query) use ($province) {
                    $query->where('province_code',$province);
                });
            })
            ->first();
            
            if($m != null){
                if($zipcode){
                    $m->zipcode = $zipcode;
                    $m->save();
                }
                $municipality = $m->code;
                if(!$m->is_chartered){
                    $district = $m->district;
                }
            }else{
                $municipality = strtolower($municipality);
                $test = strpos($municipality,'city');
                if($test){
                    $list = str_replace(" city",'',$municipality);
                    $municipality = 'City of '.$list;

                    $m = LocationMunicipality::where(function($query) use ($municipality) {  
                        $query->where('name','LIKE', '%'.$municipality.'%');
                    })
                    ->when($province, function ($query, $province) {
                        $query->whereHas('province',function ($query) use ($province) {
                            $query->where('province_code',$province);
                        });
                    })
                    ->first();
    
                    if($m != null){
                        if($zipcode){
                            $m->zipcode = $zipcode;
                            $m->save();
                        }
                        $municipality = $m->code;
                        if(!$m->is_chartered){
                            $district = $m->district;
                        }
                    }else{
                        $municipality = null;
                    }
                }else{
                    $municipality = null;
                }
            }
        }


        if($barangay != null){
            $barangay = str_replace("STO.","Santo",$barangay);
            $barangay = str_replace("STA.","Santa",$barangay);

            $b = LocationBarangay::where(function($query) use ($barangay) {  
                $query->where('name','LIKE', '%'.$barangay.'%');
            })
            ->when($municipality, function ($query, $municipality) {
                $query->whereHas('municipality',function ($query) use ($municipality) {
                    $query->where('municipality_code',$municipality);
                });
            })
            ->first();
            if($b != null){
                $barangay = $b->code;
            }else{
                $barangay = null;
            }
        }

        if($province != null && $municipality != null && $barangay != null && $district != null){
            $is_completed = 1;
        }   

        $address = [
            // 'hs_school' => $hs_school,
            'barangay_code' => $barangay,
            'municipality_code' => $municipality,
            'province_code' => $province,
            'region_code' => $region,
            // 'district' => $district,
            // 'zipcode' => $zipcode,
            'is_completed' => $is_completed,
            'created_at' => now(),
            'updated_at' => now(),
            'information' => json_encode($information),
            'qualifier_id' => $id
        ];
        return $address;
    }
}
