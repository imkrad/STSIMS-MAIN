<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationRegion;
use App\Models\LocationProvince;
use App\Models\LocationMunicipality;
use App\Models\LocationBarangay;
use App\Models\ListAgency;
use App\Models\ListDropdown;
use App\Models\ListPrivilege;
use App\Models\ListProgram;
use App\Models\ListStatus;
use App\Models\ListCourse;
use App\Models\School;
use App\Models\SchoolCampus;
use Laravel\Sanctum\PersonalAccessToken;

class IndexController extends Controller
{
    public function locations(Request $request,$type){
        if($type == 'count'){
            $array = [
                'Regions' => LocationRegion::count(),
                'Provinces' => LocationProvince::count(),
                'Municipalities' => LocationMunicipality::count(),
                'Barangays' => LocationBarangay::count()
            ];
            return $array;
        }else{
            switch($type){
                case 'regions' :
                    $data = LocationRegion::get();
                break;
                case 'provinces' :
                    $data = LocationProvince::get();
                break;
                case 'municipalities' :
                    $data = LocationMunicipality::get();
                break;
                case 'barangays' :
                    $data = LocationBarangay::get();
                break;
            }
            return $data;
        }
    }

    public function lists(Request $request,$type){
        if($type == 'count'){
            $array = [
                'Agencies' => ListAgency::count(),
                'Courses' => ListCourse::count(),
                'Programs' => ListProgram::count(),
                'Privileges' => ListPrivilege::count(),
                'Dropdowns' => ListDropdown::count(),
                'Statuses' => ListStatus::count()
            ];
            return $array;
        }else{
            switch($type){
                case 'agencies' :
                    $data = ListAgency::get();
                break;
                case 'courses' :
                    $data = ListCourse::get();
                break;
                case 'programs' :
                    $data = ListProgram::get();
                break;
                case 'privileges' :
                    $data = ListPrivilege::get();
                break;
                case 'dropdowns' :
                    $data = ListDropdown::get();
                break;
                case 'statuses' :
                    $data = ListStatus::get();
                break;
                case 'settings' :
                    return $this->settings($request);
                break;
            }
            return $data;
        }
    }

    public function schools(Request $request,$type){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $region = $token->tokenable->profile->agency->region_code;

        if($type == 'count'){
            $in = SchoolCampus::where('region_code',$region)->count();
            $out = SchoolCampus::where('region_code','!=',$region)->count();
            $assigned = SchoolCampus::where('assigned_region',$region)->count();
            $array = [
                'Inside' => $in,
                'Outside' => $out,
                'Assigned' => $assigned,
                'Total' => $in + $out
            ];
            return $array;
        }else if($type == 'download'){
            $data = School::with('campuses','campuses.courses','campuses.names')->get();
            return $data;
        }else{
            $data = School::with('campuses','campuses.courses','campuses.names')->get();
            return $data;
        }
    }

    public function user(Request $request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        if($token){
            return response()->json(['status' => true], 200);
        }else{
            return response()->json(['status' => 'Unauthorized'], 401);
        }
    }
}
