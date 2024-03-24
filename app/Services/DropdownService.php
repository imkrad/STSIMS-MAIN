<?php

namespace App\Services;

use App\Models\{
    LocationRegion,
    LocationProvince,
    LocationMunicipality,
    LocationBarangay,
    ListDropdown,
    ListProgram,
    ListCourse,
    ListStatus,
    SchoolCampus,
};

class DropdownService
{
    public function regions(){
        $data = LocationRegion::all()->map(function ($item) {
            return [
                'value' => $item->code,
                'name' => $item->region
            ];
        });
        return $data;
    }

    public function provinces($code){
        $data = LocationProvince::where('region_code',$code)->get()->map(function ($item) {
            return [
                'value' => $item->code,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function municipalities($code){
        $data = LocationMunicipality::where('province_code',$code)->get()->map(function ($item) {
            return [
                'value' => $item->code,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function barangays($code){
        $data = LocationBarangay::where('municipality_code',$code)->get()->map(function ($item) {
            return [
                'value' => $item->code,
                'name' => $item->name
            ];
        });
        return $data;
    }

    public function terms(){
        $terms = ListDropdown::where('classification','Term Type')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $terms;
    }

    public function gradings(){
        $gradings = ListDropdown::where('classification','Grading System')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name
            ];
        });
        return $gradings;
    }

    public function certifications(){
        $data = ListDropdown::where('classification','Certification')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->others
            ];
        });
        return $data;
    }

    public function levels(){
        $data = ListDropdown::where('classification','Level')->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'others' => $item->others
            ];
        });
        return $data;
    }

    public function programs(){
        $data = ListProgram::all()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'is_sub' => $item->is_sub
            ];
        });
        return $data;
    }

    public function statuses(){
        $data = ListStatus::all()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
                'type' => $item->type,
                'color' => $item->color,
                'others' => $item->others,
                'is_active' => $item->is_active,
            ];
        });
        return $data;
    }

    public function schools($request){
        $keyword = $request->keyword;
        if(!empty($keyword)){
            $data = SchoolCampus::with('school','term')
            ->whereHas('school',function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%'.$keyword.'%');
            })
            ->orWhere(function ($query) use ($keyword) {
                $query->where('campus',$keyword);
            })->get()->map(function ($item) {
                $campus = ($item->is_alone) ? '' : '-'.$item->campus;
                $name = $item->school->name.$campus;
                return [
                    'value' => $item->id,
                    'name' => $name
                ];
            });
        }else{
            $data = [];
        }
        return $data;
    }

    public function courses($request){
        $keyword = $request->keyword;
        if(!empty($keyword)){
            $data = ListCourse::where('name', 'LIKE', '%'.$keyword.'%')
            ->orWhere('shortcut', 'LIKE', '%'.$keyword.'%')->get()->map(function ($item) {
                return [
                    'value' => $item->id,
                    'name' => ($item->name) ? $item->name : $item->shortcut
                ];
            });
        }else{
            $data = [];
        }
        return $data;
    }
}
