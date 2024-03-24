<?php

namespace App\Services\Qualifier;

use App\Models\{
    Qualifier,
    QualifierAddress,
    QualifierProfile,
    QualifierEndorsement,
};
use App\Http\Resources\Qualifier\IndexResource;
use App\Http\Resources\Qualifier\EndorsementResource;

class ViewService
{
    public function lists($request){
        $region = null;
        $info = (!empty(json_decode($request->info))) ? json_decode($request->info) : NULL;
        $keyword = $request->keyword;
        $count  = $request->count;

        $data = IndexResource::collection(
            Qualifier::
            with('address.region','address.province','address.municipality','address.barangay')
            ->with('profile')
            ->with('deferment','notavail')
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
            ->paginate($count)
            ->withQueryString()
        );

        return $data;
    }
}
