<?php

namespace App\Http\Controllers\Directories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Directory\ProgramService;
use App\Traits\HandlesTransaction;
use App\Http\Requests\ProgramRequest;

class ProgramController extends Controller
{
    use HandlesTransaction;

    public function __construct(ProgramService $program){
        $this->program = $program;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->program->lists($request);
            break;
            default :
            return inertia('Modules/Directory/Programs/Index');
        }
    }

    public function store(ProgramRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->program->save($request);
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
            return $this->program->update($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
