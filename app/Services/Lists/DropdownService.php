<?php

namespace App\Services\Lists;

use App\Models\ListDropdown;

class DropdownService
{
    public function lists(){
        $dropdowns = ListDropdown::where('name','!=','n/a')->get()->groupBy('classification');
        $groupedDropdowns = [];
        foreach ($dropdowns as $classification => $items) {
            $groupedDropdowns[] = [
                'value' => $classification,
                'name' => $classification,
                'lists' => $items->toArray() 
            ];
        }
        return $groupedDropdowns;
    }

    public function save($request){
        $data = ListDropdown::create($request->all());
        return $data;
    }
}
