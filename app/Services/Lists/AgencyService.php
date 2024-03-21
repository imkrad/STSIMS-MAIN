<?php

namespace App\Services\Lists;

use App\Models\ListAgency;
use App\Models\LocationRegion;
use App\Http\Resources\DefaultResource;

class AgencyService
{
    public function lists($request){
        $data = DefaultResource::collection(
            ListAgency::query()
            ->with('region')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('acronym', 'LIKE', "%{$keyword}%");
            })
            ->paginate($request->count)
        );
        return $data;
    }

    public function save($request){
        $data = ListAgency::create($request->all());
        $data = ListAgency::findOrFail($data->id);
        return [
            'data' => new DefaultResource($data),
            'message' => 'Agency creation was successful!', 
            'info' => "You've successfully created a new agency."
        ];
    }

    public function update($request){
        $data = ListAgency::findOrFail($request->id)->update($request->all());
        $updated = ListAgency::findOrFail($request->id);
        return [
            'data' => new DefaultResource($updated),
            'message' => 'Agency update was successful!', 
            'info' => "You've successfully updated the selected agency."
        ];
    }
}
