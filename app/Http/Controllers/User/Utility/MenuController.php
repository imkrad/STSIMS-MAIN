<?php

namespace App\Http\Controllers\User\Utility;

use App\Models\ListMenu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HandlesTransaction;
use App\Http\Resources\DefaultResource;

class MenuController extends Controller
{
    use HandlesTransaction;

    public function lists(){
        $data = ListMenu::get();
        return DefaultResource::collection($data);
    }   

    public function index(){
        $overall = []; $menus = []; $listahan = [];
        $lists = ListMenu::where('is_mother',1)->where('group','Menu')->orderBy('order','ASC')->get();
        foreach($lists as $list){
            
            $submenus = [];
            if($list['has_child']){
                $subs = ListMenu::where('group',$list['name'])->get();
                foreach($subs as $menu){
                    $submenus[] = $menu;
                }
            }
            $menus[] = [
                'main' => $list,
                'submenus' => $submenus
            ];
        }

        $lists = ListMenu::where('is_mother',1)->where('group','Lists')->get();
        foreach($lists as $list){
            
            $submenus = [];
            if($list['has_child']){
                $subs = ListMenu::where('group',$list['name'])->get();
                foreach($subs as $menu){
                    $submenus[] = $menu;
                }
            }
            $listahan[] = [
                'main' => $list,
                'submenus' => $submenus
            ];
        }
        return $overall = [
            'menus' => $menus,
            'lists' => $listahan
        ];
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:list_roles,name,'.$request->id,
            'icon' => 'required',
            'route' => 'required_if:has_child,false',
            'path' => 'required',
            'group' => 'required',
            'submenus' => [
                'required_if:has_child,true',
                'array', 
            ],
            'submenus.*.name' => 'required_if:has_child,true',
            'submenus.*.route' => 'required_if:has_child,true',
            'submenus.*.path' => 'required_if:has_child,true',
        ],[
            'name.required' => 'Name required',
            'name.unique' => 'Already been taken.',
            'icon.required' => 'Icon required',
            'route.required_if' => 'Route required',
            'path.required' => 'Path required',
            'group.required' => 'Group required',
            'submenus.required_if' => 'The submenus field is required when has_child is true.',
            'submenus.*.name.required_if' => 'The name field in submenus is required when has_child is true.',
            'submenus.*.route.required_if' => 'The route field in submenus is required when has_child is true.',
            'submenus.*.path.required_if' => 'The path field in submenus is required when has_child is true.',
        ]);

        $result = $this->handleTransaction(function () use ($request) {
            $count = ListMenu::where('is_mother',1)->count() + 1;
            $menu = ListMenu::create(array_merge($request->all(),['order' => $count]));

            if($request->has_child){
                $submenus = $request->submenus;
                foreach($submenus as $key => $submenu){
                    $menu = new ListMenu;
                    $menu->name = $submenu['name'];
                    $menu->route = $submenu['route'];
                    $menu->path = $submenu['path'];
                    $menu->is_mother = 0;
                    $menu->has_child = 0;
                    $menu->group = $request->name;
                    $menu->order = $key+1;
                    $menu->save();
                }
            }
            return [
                'data' => $menu,
                'message' => 'Menu creation was successful!', 
                'info' => "You've successfully created a menu."
            ];
        });

        return back()->with([
            'data' => $result['data'],
            'message' => $result['message'],
            'info' => $result['info'],
            'status' => $result['status'],
        ]);
    }
}
