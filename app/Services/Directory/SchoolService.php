<?php

namespace App\Services\Directory;

use App\Models\School;
use App\Models\SchoolCampus;
use App\Http\Resources\Directory\School\IndexResource;
use App\Http\Resources\Directory\School\ListsResource;

class SchoolService
{
    public function schools($request){
        $data = School::with('class:id,name')
        ->with('campuses.grading:id,name')
        ->with('campuses.term:id,name','campuses.region','campuses.assigned','campuses.province','campuses.municipality')
        ->when($request->keyword, function ($query, $keyword) {
            $query->where('name', 'LIKE', '%'.$keyword.'%');
        })
        ->orderBy('id','DESC')
        ->paginate($request->count);
        
        return IndexResource::collection($data);
    }

    public function campuses($request){
        $data = SchoolCampus::with(['grading:id,name','term:id,name','region','province','municipality','assigned'])
        ->with('school:id,name,avatar,shortcut,combiner,class_id','school.class:id,name')
        ->when($request->keyword, function ($query, $keyword) {
            $query->whereHas('school',function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%'.$keyword.'%');
            })->orWhere(function ($query) use ($keyword) {
                $query->where('campus', 'LIKE', '%'.$keyword.'%');
            });
        })
        ->paginate($request->count);

        return ListsResource::collection($data);
    }
}
