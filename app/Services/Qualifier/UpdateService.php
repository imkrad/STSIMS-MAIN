<?php

namespace App\Services\Qualifier;

use App\Models\Qualifier;
use App\Models\QualifierAddress;
use App\Models\QualifierNotavail;
use App\Models\QualifierDeferment;
use App\Models\Scholar;
use App\Models\ScholarAddress;
use App\Models\ScholarEducation;
use App\Models\ScholarProfile;
use App\Models\QualifierEndorsement;
use App\Models\SchoolCampus;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Resources\Qualifier\IndexResource;

class UpdateService
{
    public function enroll($request){ 
        $scholar = $request->user;
        $count = Scholar::where('spas_id',$scholar['spas_id'])->count();
  
        if($count == 0){
            $info = [
                'spas_id' => $scholar['spas_id'],
                'program_id' => $scholar['program']['id'],
                'subprogram_id' => $scholar['subprogram']['id'],
                'category_id' => 21,
                'status_id' => 7,
                'awarded_year' =>  $scholar['qualified_year'],
                'is_completed' => 1,
                'is_undergrad' => $scholar['is_undergrad'],
                'created_at' => now(),
                'updated_at' => now()
            ];

            \DB::beginTransaction();
            $scholar_info = Scholar::create($info);

            if($scholar_info){
                $education = [
                    'school_id' => $request->school_id,
                    'course_id' => $request->course_id,
                    'level_id' => ($scholar['is_undergrad'] == 1) ? 24 : 26,
                    // 'information' => json_encode($info = []),
                    'is_completed' => 1,
                    'is_enrolled' => 1,
                    'is_shiftee' => 0,
                    'is_transferee' => 0,
                    'scholar_id' => $scholar_info->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];

                $education_info = ScholarEducation::insertOrIgnore($education);

                if($education_info){
                    $profile = [
                        'email' => $scholar['profile']['email'],
                        'firstname' => $scholar['profile']['firstname'],
                        'middlename' => $scholar['profile']['middlename'],
                        'lastname' => $scholar['profile']['lastname'],
                        'suffix' => $scholar['profile']['suffix'],
                        'sex' => $scholar['profile']['sex'],
                        'contact_no' => $scholar['profile']['contact_no'],
                        'sex' => $scholar['profile']['sex'],
                        'birthday' => $scholar['profile']['birthday'],
                        'is_completed' => 1,
                        'scholar_id' => $scholar_info->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    $profile_info = ScholarProfile::insertOrIgnore($profile);

                    if($profile_info){
                        $address = [
                            'address' => 'n/a',
                            'region_code' => $scholar['address']['region']['code'],
                            'province_code' => $scholar['address']['province']['code'],
                            'municipality_code' => $scholar['address']['municipality']['code'],
                            'barangay_code' => $scholar['address']['barangay']['code'],
                            'district' => $scholar['address']['district'],
                            // 'information' => json_encode($information = []),
                            'is_permanent' => 1,
                            'is_within' => 0,
                            'is_completed' => 1,
                            'scholar_id' => $scholar_info->id,
                            'created_at' => now(),
                            'updated_at' => now()
                        ];

                        $address_info = ScholarAddress::insertOrIgnore($address);

                        if($address_info){
                            $qualifier = Qualifier::where('id',$scholar['id'])->update(['status_id' => 17,'is_completed' => 1]);
                            $type = 'bxs-check-circle';
                            $message = 'Qualifier tag as scholar successfully. Thanks';
                            if($qualifier){
                                $q =  Qualifier::with('address.region','address.province','address.municipality','address.barangay')
                                    ->with('profile','program','subprogram','status','type')
                                    ->where('id',$scholar['id'])->first();
                                $type = 'bxs-x-circle';
                                $message = 'Succecss';
                            }
                            \DB::commit();
                        }else{
                            $type = 'bxs-x-circle';
                            $message = 'Contact Administrator';
                            \DB::rollback();
                        }
                    }else{
                        $type = 'bxs-x-circle';
                        $message = 'Contact Administrator';
                        \DB::rollback();
                    }
                }else{
                    $type = 'bxs-x-circle';
                    $message = 'Contact Administrator';
                    \DB::rollback();
                }
            }else{
                $type = 'bxs-x-circle';
                $message = 'Contact Administrator';
                \DB::rollback();
            }
        }else{
            $type = 'bxs-x-circle';
            $message = 'Duplicate Entry';
        }

        return response()->json($q);
    }

    public function endorse($request){
        if(\Auth::check()){
            $region = \Auth::user()->profile->agency->region->code;
            $user_id = \Auth::user()->id;
        }else{
            $bearer = $request->bearerToken();
            $token = PersonalAccessToken::findToken($bearer);
            $region = $token->tokenable->profile->agency->region_code;
            $user_id = $token->tokenable->id;
        }

        $postData = array(
            'course_id' => $request->course_id,
            'school_id' => $request->school_id,
            'endorsed_by' => $region,
            'endorsed_to' => SchoolCampus::where('id',$request->school_id)->pluck('assigned_region')->first(),
            'qualifier_id' => $request->user['id'],
            'user_id' => $user_id,
            'created_at' => now(),
            'updated_at' => now()
        );

        $data = QualifierEndorsement::create($postData);
        if($data){
            $qualifier = Qualifier::where('id',$request->user['id'])->update(['is_endorsed' => 1]);
        }
        return response()->json($data);
    }

    public function update($request){
        $data = QualifierAddress::where('id',$request->address_id)->update($request->except('id','address_id','editable','option'));
        $q = QualifierAddress::find($request->address_id);
        $qualifier = Qualifier::
            with('address.region','address.province','address.municipality','address.barangay')
            ->with('profile','program','subprogram','status','type')
            ->where('id',$q->qualifier_id)
            ->first();

        return response()->json($qualifier);
    }

    public function edit($request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);

        $data = Qualifier::where('id',$request->id)->update($request->except('id','reason','option'));
        if($request->status_id == 16){
            $postData = array(
                'reason' => $request->reason,
                'qualifier_id' => $request->id,
                'user_id' => $token->tokenable->id,
                'created_at' => now(),
                'updated_at' => now()
            );
            QualifierNotavail::create($postData);
        }
        if($request->status_id == 15){
            $postData = array(
                'reason' => $request->reason,
                'qualifier_id' => $request->id,
                'user_id' => $token->tokenable->id,
                'created_at' => now(),
                'updated_at' => now()
            );
            QualifierDeferment::create($postData);
        }
        $qualifier = Qualifier::
            with('address.region','address.province','address.municipality','address.barangay')
            ->with('profile','program','subprogram','status','type')
            ->with('deferment','notavail')
            ->where('id',$data->id)
            ->first();

        return response()->json($qualifier);
    }

    public function endorsed($request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $region = $token->tokenable->profile->agency->region_code;
        // return response()->json($request);
        $data = QualifierEndorsement::where('id',$request->id)->update(['is_approved' => 1, 'is_seened' => 1]);
        $data = $this->enroll($request);

        return response()->json($data);
    }

}
