<?php

namespace App\Services\Directory;

use App\Models\SchoolCourse;
use App\Http\Resources\Directory\CertificationResource;

class CertificationService
{
    public function lists($request){
        $data = CertificationResource::collection(
            SchoolCourse::query()
            ->with('course','school.school','certification')
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")->orWhere('shortcut', 'LIKE', "%{$keyword}%");
            })
            ->paginate($request->count)
        );
        return $data;
    }

    public function save($request){
        $data = SchoolCourse::create($request->all());
        $data = SchoolCourse::findOrFail($data->id);
        return [
            'data' => new CertificationResource($data),
            'message' => 'Certification creation was successful!', 
            'info' => "You've successfully created a new certification."
        ];
    }

    public function update($request){
        $data = SchoolCourse::findOrFail($request->id)->update($request->all());
        $updated = SchoolCourse::findOrFail($request->id);
        
        activity()
        ->performedOn($updated)
        ->causedBy(\Auth::user())
        ->withProperties(['is_active' => $request->is_active])
        ->event('updated')
        ->log('updated the a certification');

        return [
            'data' => new CertificationResource($updated),
            'message' => 'Certification update was successful!', 
            'info' => "You've successfully updated the selected certification."
        ];
    }

    public function years(){
        return [
            ['value' => 1, 'name' => '1 year'],
            ['value' => 2, 'name' => '2 years'],
            ['value' => 3, 'name' => '3 years'],
            ['value' => 4, 'name' => '4 years'],
            ['value' => 5, 'name' => '5 years']
        ];
    }
}
