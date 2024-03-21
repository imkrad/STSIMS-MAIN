<?php

namespace App\Http\Controllers\Directories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Directory\CourseService;
use App\Traits\HandlesTransaction;
use App\Http\Requests\CourseRequest;

class CourseController extends Controller
{
    use HandlesTransaction;

    public function __construct(CourseService $course){
        $this->course = $course;
    }

    public function index(Request $request){
        switch($request->option){
            case 'lists':
                return $this->course->lists($request);
            break;
            case 'dropdowns':
                return $this->course->list_courses($request);
            break;
            default :
            return inertia('Modules/Directory/Courses/Index');
        }
    }

    public function store(CourseRequest $request){
        $result = $this->handleTransaction(function () use ($request) {
            return $this->course->save($request);
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
            return $this->course->update($request);
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
