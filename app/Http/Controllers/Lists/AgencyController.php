<?php

namespace App\Http\Controllers\Lists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Services\DropdownService;
use App\Services\Lists\AgencyService;
use App\Http\Requests\AgencyRequest;

class AgencyController extends Controller
{
    use HandlesTransaction;

    public function __construct(AgencyService $agency, DropdownService $dropdown){
        $this->agency = $agency;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        $options = $request->option;
        switch($options){
            case 'lists':
                return $this->agency->lists($request);
            break;
            default: 
            return inertia('Modules/Lists/Agencies/Index',[
                'regions' => $this->dropdown->regions()
            ]);
        }
    }

    public function store(AgencyRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->agency->save($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }

    public function update(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->agency->update($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
