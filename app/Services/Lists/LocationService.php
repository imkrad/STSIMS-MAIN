<?php

namespace App\Services\Lists;

use App\Models\LocationRegion;
use App\Models\LocationProvince;
use App\Models\LocationMunicipality;
use App\Models\LocationBarangay;
use App\Http\Resources\DefaultResource;

class LocationService
{
    public function regions($request){
        $data = LocationRegion::paginate($request->count);
        return DefaultResource::collection($data);
    }

    public function provinces($request){
        $data = LocationProvince::with('region')->paginate($request->count);
        return DefaultResource::collection($data);
    }

    public function municipalities($request){
        $data = LocationMunicipality::with('province')->paginate($request->count);
        return DefaultResource::collection($data);
    }

    public function barangays($request){
        $data = LocationBarangay::with('municipality')->paginate($request->count);
        return DefaultResource::collection($data);
    }
}
