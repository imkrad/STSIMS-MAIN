<?php

namespace App\Http\Controllers\Lists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Lists\DropdownService;
use App\Traits\HandlesTransaction;

class DropdownController extends Controller
{
    use HandlesTransaction;

    public function __construct(DropdownService $dropdown){
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        $options = $request->option;
        switch($options){
            case 'lists':
            
            break;
            default: 
            return inertia('Modules/Lists/Dropdowns/Index',[
                'dropdowns' => $this->dropdown->lists()
            ]);
        }
    }

    public function store(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->dropdown->save($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
