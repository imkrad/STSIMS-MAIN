<?php

namespace App\Http\Controllers\Directories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Services\DropdownService;
use App\Services\Directory\CertificationService;
use App\Http\Requests\CertificationRequest;

class CertificationController extends Controller
{
    use HandlesTransaction;

    public function __construct(CertificationService $certification, DropdownService $dropdown){
        $this->certification = $certification;
        $this->dropdown = $dropdown;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->certification->lists($request);
            break;
            default :
            return inertia('Modules/Directory/Certifications/Index',[
                'certifications' => $this->dropdown->certifications(),
                'years' => $this->certification->years()
            ]);
        }
    }

    public function store(CertificationRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->certification->save($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
