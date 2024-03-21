<?php

namespace App\Http\Controllers\User\Utility;

use App\Models\ListRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Http\Resources\DefaultResource;

class RoleController extends Controller
{
    use HandlesTransaction;

    public function index(Request $request){
        $data = ListRole::paginate($request->count);
        return DefaultResource::collection($data);
    }   

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:list_roles,name,'.$request->id,
            'description' => 'required',
        ]);

        $result = $this->handleTransaction(function () use ($request) {
            $data = ListRole::create($request->all());
            $data = ListRole::findOrFail($data->id);
            return [
                'data' => $data,
                'message' => 'Role creation was successful!', 
                'info' => "You've successfully created a role."
            ];
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
            'type' => 'create'
        ]);
    }

    public function update(Request $request){
        $result = $this->handleTransaction(function () use ($request) {
            $user = ListRole::findOrFail($request->id)->update($request->all());
            $updatedUser = ListRole::findOrFail($request->id);
            return [
                'data' => new DefaultResource($updatedUser),
                'message' => 'Role update was successful!', 
                'info' => "You've successfully updated the selected role."
            ];
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
            'type' => 'update'
        ]);
    }

}
