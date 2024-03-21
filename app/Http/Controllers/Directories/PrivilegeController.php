<?php

namespace App\Http\Controllers\Directories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Directory\PrivilegeService;
use App\Traits\HandlesTransaction;
use App\Http\Requests\PrivilegeRequest;

class PrivilegeController extends Controller
{
    use HandlesTransaction;

    public function __construct(PrivilegeService $privilege){
        $this->privilege = $privilege;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->privilege->lists($request);
            break;
            default :
            return inertia('Modules/Directory/Privileges/Index');
        }
    }

    public function store(PrivilegeRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->privilege->save($request);
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
            return $this->privilege->update($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
