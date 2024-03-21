<?php

namespace App\Services\Directory;

use App\Models\ListCourse;
use App\Http\Resources\Directory\CourseResource;

class CourseService
{
    public function lists($request){
        $data = CourseResource::collection(
            ListCourse::query()
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('shortcut', 'LIKE', "%{$keyword}%");
            })
            ->paginate($request->count)
        );
        return $data;
    }

    public function save($request){
        $data = ListCourse::create($request->all());
        $data = ListCourse::findOrFail($data->id);
        return [
            'data' => new CourseResource($data),
            'message' => 'Course creation was successful!', 
            'info' => "You've successfully created a new course."
        ];
    }

    public function update($request){
        $data = ListCourse::findOrFail($request->id)->update($request->all());
        $updated = ListCourse::findOrFail($request->id);
    
        return [
            'data' => new CourseResource($updated),
            'message' => 'Course update was successful!', 
            'info' => "You've successfully updated the selected course."
        ];
    }
}
