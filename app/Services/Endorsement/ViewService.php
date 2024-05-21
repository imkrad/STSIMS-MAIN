<?php

namespace App\Services\Endorsement;

use App\Models\QualifierEndorsement;
use App\Models\Qualifier;
use App\Models\QualifierAddress;
use App\Models\QualifierProfile;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Resources\Qualifier\IndexResource;

class ViewService
{
    public function lists($request){
        $bearer = $request->bearerToken();
        if($bearer){
            $token = PersonalAccessToken::findToken($bearer);
            $region = $token->tokenable->profile->agency->region_code;
        }else{
            $region = null;
        }

        $info = (!empty(json_decode($request->info))) ? json_decode($request->info) : NULL;
        $keyword = $info->keyword;

        $data = IndexResource::collection(
            Qualifier::where('is_endorsed',1)
            ->with('address.region','address.province','address.municipality','address.barangay')
            ->with('profile')
            ->with('endorsement.endorsedby','endorsement.endorsedto','endorsement.course','endorsement.school.school')
            ->with('program:id,name','subprogram:id,name','type','status:id,name,type,color,others')
            ->whereHas('profile',function ($query) use ($keyword) {
                $query->when($keyword, function ($query, $keyword) {
                    $query->where(\DB::raw('concat(firstname," ",lastname)'), 'LIKE', '%'.$keyword.'%')
                    ->where(\DB::raw('concat(lastname," ",firstname)'), 'LIKE', '%'.$keyword.'%')
                    ->orWhere('spas_id','LIKE','%'.$keyword.'%');
                });
            })
            ->when($region, function ($query, $region) {
                $query->whereHas('address',function ($query) use ($region) {
                    $query->where('region_code',$region); 
                });
            })
            ->paginate($info->counts)
            ->withQueryString()
        );
        return $data;
    }
}
