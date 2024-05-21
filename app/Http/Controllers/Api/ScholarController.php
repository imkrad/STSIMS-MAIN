<?php

namespace App\Http\Controllers\Api;

use App\Models\Scholar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class ScholarController extends Controller
{
    public function fetchScholars(Request $request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $region = $token->tokenable->profile->agency->region_code;
       
        $data = Scholar::with('address')->with('education')->with('profile')
        ->whereHas('education',function ($query) use ($region) {
            $query->whereHas('school',function ($query) use ($region) {
                $query->where('assigned_region',$region); 
            });
        })
        ->get();
        return $data;
    }

    public function storeScholars(Request $request){
        $success = []; $failed = [];
      
        $scholars = $request->scholars;
        $addresses = $request->addresses;
        $educations = $request->educations;
        $profiles = $request->profiles;

        foreach($addresses as $a){
            $spas_id = $a['scholar']['spas_id'];
            $scholar = Scholar::where('spas_id',$spas_id)->first();
            $data = $scholar->address()->update([
                'address' => $a['address'],
                'region_code' => $a['region_code'],
                'province_code' => $a['province_code'],
                'municipality_code' => $a['municipality_code'],
                'barangay_code' => $a['barangay_code'],
                'district' => $a['district'],
                'is_completed' => 1
            ]);
            if($data){
                $container = [
                    'spas_id' => $spas_id,
                    'type' => 'address'
                ];
                array_push($success,$container);
            }else{
                array_push($failed,$spas_id);
            }
        }

        foreach($scholars as $s){
            $spas_id = $s['spas_id'];
            $scholar = Scholar::where('spas_id',$spas_id)->first();
            $data = $scholar->update([
                'status_id' => $s['status_id'],
            ]);
            if($data){
                $container = [
                    'spas_id' => $spas_id,
                    'type' => 'scholar'
                ];
                array_push($success,$container);
            }else{
                array_push($failed,$spas_id);
            }
        }

        foreach($educations as $e){
            $spas_id = $e['scholar']['spas_id'];
            $scholar = Scholar::where('spas_id',$spas_id)->first();
            $data = $scholar->education()->update([
                'school_id' => $e['school_id'],
                'course_id' => $e['course_id'],
                'level_id' => $e['level_id'],
                'award_id' => $e['award_id'],
                'graduated_year' => $e['graduated_year'],
                'is_completed' => 1
            ]);
            if($data){
                $container = [
                    'spas_id' => $spas_id,
                    'type' => 'education'
                ];
                array_push($success,$container);
            }else{
                array_push($failed,$spas_id);
            }
        }

        foreach($profiles as $p){
            $spas_id = $p['scholar']['spas_id'];
            $scholar = Scholar::where('spas_id',$spas_id)->first();
            $data = $scholar->profile()->update([
                'account_no' => $s['account_no'],
                'email' => $p['email'],
                'firstname' => $p['firstname'],
                'lastname' => $p['lastname'],
                'middlename' => $p['middlename'],
                'contact_no' => $s['contact_no'],
                'is_completed' => 1
            ]);
            if($data){
                $container = [
                    'spas_id' => $spas_id,
                    'type' => 'profile'
                ];
                array_push($success,$container);
            }else{
                array_push($failed,$spas_id);
            }
        }

        $array = [
            'success' => $success,
            'failed' => $failed
        ];

        return response()->json($array);
    }
}
