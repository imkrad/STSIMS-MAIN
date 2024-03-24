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
}
