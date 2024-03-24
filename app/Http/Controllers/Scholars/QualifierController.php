<?php

namespace App\Http\Controllers\Scholars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Services\DropdownService;
use App\Services\Qualifier\SaveService;
use App\Services\Qualifier\ViewService;
use App\Services\Qualifier\UpdateService;

class QualifierController extends Controller
{
    use HandlesTransaction;

    public function __construct(SaveService $save, ViewService $view, UpdateService $update, DropdownService $dropdown){
        $this->save = $save;
        $this->view = $view;
        $this->update = $update;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->view->lists($request);
            break;
            default :
            return inertia('Modules/Scholars/Qualifiers/Index',[
                'dropdowns' => [
                    'programs' => $this->dropdown->programs(),
                    'regions' =>  $this->dropdown->regions(),
                    'levels' =>  $this->dropdown->levels(),
                    'statuses' => $this->dropdown->statuses()
                ]
            ]);
        }
    }

    public function store(Request $request){
        $option = $request->option;
        switch($option){
            case 'preview':
                return $this->save->preview($request);
            break;
            case 'upload':
                return $this->save->upload($request);
            break;
        }
    }
}
