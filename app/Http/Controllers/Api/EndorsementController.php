<?php

namespace App\Http\Controllers\Api;

use App\Models\Qualifier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Resources\Qualifier\IndexResource;

class EndorsementController extends Controller
{
    public function fetchEndorsements(Request $request){
        $info['year'] = Qualifier::max('qualified_year');
        $info = (!empty(json_decode($request->info))) ? json_decode($request->info) : NULL;
        $filter = (!empty(json_decode($request->subfilters))) ? json_decode($request->subfilters) : NULL;
        $keyword = $info->keyword;
        $counts = $info->counts;
        $type = $request->type;

        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $region = $token->tokenable->profile->agency->region_code;

        $data = Qualifier::where('is_endorsed',1)
        ->with('address')->with('profile')
        ->with('endorsement.endorsedby','endorsement.endorsedto','endorsement.course','endorsement.school.school')
        ->whereHas('endorsement',function ($query) use ($region,$type){
            ($type == 'From') ? $query->where('endorsed_to',$region) : $query->where('endorsed_by',$region);
        })
        ->whereHas('address',function ($query) use ($filter) {
            if(!empty($filter)){
                (property_exists($filter, 'region')) ? $query->where('region_code',$filter->region) : '';
                (property_exists($filter, 'province')) ? $query->where('province_code',$filter->province) : '';
                (property_exists($filter, 'municipality')) ? $query->where('municipality_code',$filter->municipality) : '';
                (property_exists($filter, 'barangay')) ? $query->where('barangay_code',$filter->barangay) : '';
            }
        })
        ->whereHas('profile',function ($query) use ($keyword) {
            $query->when($keyword, function ($query, $keyword) {
                $query->where(\DB::raw('concat(firstname," ",lastname)'), 'LIKE', '%'.$keyword.'%')
                ->where(\DB::raw('concat(lastname," ",firstname)'), 'LIKE', '%'.$keyword.'%')
                ->orWhere('spas_id','LIKE','%'.$keyword.'%');
            });
        })
        ->whereHas('status',function ($query) use ($info) {
            if(!empty($info)){
                ($info->status == null) ? '' : $query->where('status_id',$info->status);
            }
        })
        ->where(function ($query) use ($info,$filter) {
            if(!empty($filter)){
                (property_exists($filter, 'program')) ? $query->where('program_id',$filter->program) : '';
                (property_exists($filter, 'subprogram')) ? $query->where('subprogram_id',$filter->subprogram) : '';
            }
            if(!empty($info)){
                ($info->year == null) ? '' : $query->where('qualified_year',$info->year);
            }
         })
        ->paginate($counts);
        return IndexResource::collection($data);
    }

    public function getStatistics(Request $request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $region = $token->tokenable->profile->agency->region_code;
        
        $total = Qualifier::where('is_endorsed',1)->whereHas('endorsement',function ($query) use ($region) {
            $query->where('endorsed_to',$region);
         })->count();

        $statistics = [
            Qualifier::where('is_endorsed',1)->whereHas('endorsement',function ($query) use ($region) {
                $query->where('endorsed_to',$region);
            })->where('is_undergrad',1)->count(),
            Qualifier::where('is_endorsed',1)->whereHas('endorsement',function ($query) use ($region) {
                $query->where('endorsed_to',$region);
            })->where('is_undergrad',0)->count(),
            $total
        ];

        $types = [
            Qualifier::where('is_endorsed',1)->whereHas('type',function ($query) {
                $query->where('name','Enrolled');
            })
            ->whereHas('endorsement',function ($query) use ($region) {
                $query->where('endorsed_by',$region);
             })->count(),
             Qualifier::where('is_endorsed',1)->whereHas('type',function ($query) {
                $query->where('name','Enrolled');
            })
            ->whereHas('endorsement',function ($query) use ($region) {
                $query->where('endorsed_to',$region);
             })->count()
        ];

        $array = [
            'total' => $total,
            'ongoing' =>  Qualifier::where('is_endorsed',1)->whereHas('type',function ($query) {
                $query->where('name','Enrolled');
            })
            ->whereHas('endorsement',function ($query) use ($region) {
                $query->where('endorsed_to',$region);
             })->count(),
            'statistics' => $statistics,
            'types' => $types
        ];
        return $array;
    }
}
