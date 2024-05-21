<?php

namespace App\Http\Controllers\Api;

use App\Models\Qualifier;
use App\Models\ListStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Resources\Qualifier\IndexResource;

class QualifierController extends Controller
{
    public function fetchQualifiers(Request $request){
        $info = (!empty(json_decode($request->info))) ? json_decode($request->info) : NULL;
        $filter = (!empty(json_decode($request->subfilters))) ? json_decode($request->subfilters) : NULL;
       
        $info->year = Qualifier::max('qualified_year');
        $keyword = $info->keyword ?? null;
        $counts = $info->counts ?? null;
        $type = $info->type ?? null;
        $status = $info->status ?? null;

        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $region = $token->tokenable->profile->agency->region_code;

        $data = Qualifier::with('address','profile','notavail','deferment','endorsement')
        ->when($type !== null, function ($query) use ($type) {
            $query->where('is_undergrad',$type);
        })
        ->when($status !== null, function ($query) use ($status) {
            $query->where('status_id',$status);
        })
        ->whereHas('profile',function ($query) use ($keyword) {
            $query->when($keyword, function ($query, $keyword) {
                $query->where(\DB::raw('concat(firstname," ",lastname)'), 'LIKE', '%'.$keyword.'%')
                ->where(\DB::raw('concat(lastname," ",firstname)'), 'LIKE', '%'.$keyword.'%')
                ->orWhere('spas_id','LIKE','%'.$keyword.'%');
            });
        })
        ->where('region',$region)
        ->paginate($counts);
        return IndexResource::collection($data);
    }

    public function getStatistics(Request $request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $region = $token->tokenable->profile->agency->region_code;
        $year = Qualifier::max('qualified_year');

        $statuses = ListStatus::where('type','Qualifier')->get();
        foreach($statuses as $status){
            $statistics[] = [
                'status' => $status->name,
                'count' => Qualifier::where('status_id',$status->id) //->where('is_endorsed',0)
                ->where('qualified_year',$year)->where('region',$region)->count()
            ];
        }
        $types = [
            Qualifier::where('is_undergrad',1)->where('region',$region)->where('qualified_year',$year)->count(),
            Qualifier::where('is_undergrad',0)->where('region',$region)->where('qualified_year',$year)->count(),
        ];

        $array = [
            'year'=> $year,
            'total'=> Qualifier::where('region',$region)->where('qualified_year',$year)->count(),
            'ongoing'=>  Qualifier::whereHas('type',function ($query) {$query->where('name','Enrolled');})
            ->where('is_endorsed',0)->where('region',$region)->where('qualified_year',$year)->count(),
            'statistics'=> $statistics,
            'types'=> $types,
            'endorsements'=> Qualifier::where('is_endorsed',1)->where('region',$region)->where('qualified_year',$year)->count()
        ];
        return $array;
    }
}
