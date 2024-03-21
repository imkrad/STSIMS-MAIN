<?php

namespace App\Services\Scholar;

use Carbon\Carbon;
use App\Models\{
    ListStatus,
    ListCourse,
    ListProgram,
    ListDropdown,
    School,
    SchoolCampus,
    SchoolName,
    LocationRegion,
    LocationProvince,
    LocationMunicipality,
    LocationBarangay
};
use App\Imports\ScholarImport;
use Maatwebsite\Excel\Facades\Excel;

class SaveService
{
    public function preview($request){
        $data =  Excel::toCollection(new ScholarImport,$request->import_file);
        $rows = $data[0]; 
        foreach($rows as $row){ 
            if($row[1] != ''){
                $information[] = [
                    'spas_id' => $row[0],
                    'firstname' => strtoupper(strtolower($row[1])),
                    'middlename' => strtoupper(strtolower($row[2])),
                    'lastname' => strtoupper(strtolower($row[3])),
                    'suffix' => strtoupper(strtolower($row[4])),
                    'sex' => $row[5],
                    'birthday' =>  Carbon::parse($row[6])->format('Y-m-d'),
                    'address' => strtoupper(strtolower($row[7])), strtoupper(strtolower($row[8])),
                    'barangay' => strtoupper(strtolower($row[9])),
                    'municipality' => strtoupper(strtolower($row[10])),
                    'province' => strtoupper(strtolower($row[11])),
                    'region' => strtoupper(strtolower($row[12])),
                    'district' => strtoupper(strtolower($row[13])),
                    'zipcode' => strtoupper(strtolower($row[14])),
                    'email' => strtolower($row[15]),
                    'contact' => strtoupper(strtolower($row[16])),
                    'year_awarded' => $row[17],
                    'program' => strtoupper(strtolower($row[18])),
                    'subprogram' => strtoupper(strtolower($row[19])),
                    'category' => strtoupper(strtolower($row[20])),
                    'schp_award' => strtoupper(strtolower($row[21])),
                    'course' => strtoupper(strtolower($row[22])),
                    'school' => strtoupper(strtolower($row[23])),
                    'status' => strtoupper(strtolower($row[25]))
                ];
            }
        }
        return $information;
    }
}
