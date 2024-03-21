<?php

namespace App\Http\Controllers\User\Utility;

use Spatie\Activitylog\Models\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ActivityResource;

class LogController extends Controller
{
    public function activity(Request $request){
        $data = Activity::with('causer.profile')->orderBy('created_at','DESC')->paginate($request->count);
        return ActivityResource::collection($data);
    }
}
