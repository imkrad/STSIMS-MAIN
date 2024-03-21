<?php

namespace App\Http\Controllers\User;

use App\Models\configuration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function index($type){
        switch($type){
            case 'overview':
                return inertia('Modules/User/Utility/Pages/Overview',[
                    'configuration' =>  $this->configuration()
                ]);
            break;
            case 'users':
                return inertia('Modules/User/Utility/Pages/User',[
                    'configuration' =>  $this->configuration()
                ]);
            break;
            case 'roles':
                return inertia('Modules/User/Utility/Pages/Role',[
                    'configuration' =>  $this->configuration()
                ]);
            break;
            case 'menus':
                return inertia('Modules/User/Utility/Pages/Menu',[
                    'configuration' =>  $this->configuration()
                ]);
            break;
            case 'authentications':
                return inertia('Modules/User/Utility/Pages/Authentication',[
                    'statistics' => [],
                    'configuration' =>  $this->configuration()
                ]);
            break;
            case 'activities':
                return inertia('Modules/User/Utility/Pages/Activity',[
                    'configuration' =>  $this->configuration()
                ]);
            break;
            case 'configurations':
                return inertia('Modules/User/Utility/Pages/System',[
                    'configuration' =>  $this->configuration()
                ]);
            break;  
            case 'backup':
                return inertia('Modules/User/Utility/Pages/Backup',[
                    'configuration' =>  $this->configuration()
                ]);
            break;  
        }
    }

    public function configuration(){
        $data = Configuration::where('id',1)->first();
        return $data;
    }
}
