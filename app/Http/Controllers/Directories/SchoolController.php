<?php

namespace App\Http\Controllers\Directories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Services\DropdownService;
use App\Services\Directory\SchoolService;

class SchoolController extends Controller
{
    use HandlesTransaction;

    public function __construct(SchoolService $school, DropdownService $dropdown){
        $this->school = $school;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'schools':
                return $this->school->schools($request);
            break;
            case 'campuses':
                return $this->school->campuses($request);
            break;
            case 'dropdowns':
                return $this->dropdown->schools($request);
            break;
            default :
            return inertia('Modules/Directory/Schools/Index',[
                'regions' => $this->dropdown->regions(),
                'dropdowns' => [
                    'terms' => $this->dropdown->terms(),
                    'gradings' => $this->dropdown->gradings()
                ]
            ]);
        }
    }
}
