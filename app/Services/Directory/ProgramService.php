<?php

namespace App\Services\Directory;

use App\Models\ListProgram;
use App\Http\Resources\DefaultResource;

class ProgramService
{
    public function lists($request){
        $data = DefaultResource::collection(
            ListProgram::query()
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('others', 'LIKE', "%{$keyword}%");
            })
            ->paginate($request->count)
        );
        return $data;
    }

    public function save($request){
        $data = ListProgram::create($request->all());
        $data = ListProgram::findOrFail($data->id);
        return [
            'data' => new DefaultResource($data),
            'message' => 'Program creation was successful!', 
            'info' => "You've successfully created a new program."
        ];
    }

    public function update($request){
        $data = ListProgram::findOrFail($request->id)->update($request->all());
        $updated = ListProgram::findOrFail($request->id);
    
        return [
            'data' => new DefaultResource($updated),
            'message' => 'Program update was successful!', 
            'info' => "You've successfully updated the selected program."
        ];
    }
}
