<?php

namespace App\Services\Directory;

use App\Models\ListPrivilege;
use App\Http\Resources\DefaultResource;

class PrivilegeService
{
    public function lists($request){
        $data = DefaultResource::collection(
            ListPrivilege::query()
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            })
            ->when($request->type, function ($query, $type) {
                $query->where('type',$type);
            })
            ->when($request->is_active, function ($query, $status) {
               ($status === 'true') ? $query->where('is_active',1) : $query->where('is_active',0);
            })
            ->paginate($request->count)
        );
        return $data;
    }

    public function save($request){
        $data = ListPrivilege::create($request->all());
        $data = ListPrivilege::findOrFail($data->id);
        return [
            'data' => new DefaultResource($data),
            'message' => 'Privilege creation was successful!', 
            'info' => "You've successfully created a new privilege."
        ];
    }

    public function update($request){
        $data = ListPrivilege::findOrFail($request->id)->update($request->all());
        $updated = ListPrivilege::findOrFail($request->id);
    
        return [
            'data' => new DefaultResource($updated),
            'message' => 'Privilege update was successful!', 
            'info' => "You've successfully updated the selected privilege."
        ];
    }
}
