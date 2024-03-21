<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Spatie\Activitylog\Models\Activity;
use App\Http\Resources\ActivityResource;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index(Request $request){
        $options = $request->option;
        switch($options){
            case 'authentication-logs':
                return $this->authenticationLogs($request);
            break;
            case 'activity-logs':
                return $this->activityLogs($request);
            break;
            case 'statistics':
                return $this->statistics();
            break;
            case 'sessions':
                return $this->sessions($request);
            break;
              case 'sessions':
                return $this->sessions($request);
            break;
            default: 
            return inertia('Modules/User/Profile/Index');
        }
    }
   
    public function update(ProfileRequest $request){
        $data = User::find(\Auth::user()->id);
        $data->profile()->update($request->except(['username', 'email']));
        
        return back()->with([
            'data' => $data,
            'message' => 'User update was successful!', 
            'info' => "You've successfully update user profile.",
            'status' => true
        ]);
    }

    public function authenticationLogs($request){
        return [];
    }

    public function activityLogs($request){
        $data = Activity::with('causer.profile')->orderBy('created_at','DESC')->paginate($request->count);
        return ActivityResource::collection($data);
    }

    public function sessions($request){
        // dd($request->session()->id);
        if (config('session.driver') !== 'database') {
            return collect();
        }

        return collect(
            \DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
                    ->where('user_id', \Auth::user()->id)
                    ->orderBy('last_activity', 'desc')
                    ->get()
        )->map(function ($session) use ($request){
            $agent = $this->createAgent($session);

            return (object) [
                'agent' => [
                    'is_desktop' => $agent->isDesktop(),
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ],
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === $request->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }

    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }

    public function statistics(){
        return [
            [
                'name' => 'Successful Login',
                'icon' => 'ri-checkbox-circle-fill',
                'color' => 'text-success',
                'total' => 0
            ],
            [
                'name' => 'Suspicious Login',
                'icon' => 'ri-error-warning-fill',
                'color' => 'text-warning',
                'total' => 0
            ],
            [
                'name' => 'Login Attempts',
                'icon' => 'ri-close-circle-fill',
                'color' => 'text-danger',
                'total' => 0
            ]
        ];
    }

    public function destroy(Request $request)
    {
        if (!Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
        // $guard->logoutOtherDevices($request->password);
        $this->deleteOtherSessionRecords($request);
        return back(303);
    }

    protected function deleteOtherSessionRecords(Request $request)
    {
        if (config('session.driver') !== 'database') {
            return;
        }
        \DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', $request->user()->getAuthIdentifier())
            ->where('id', '!=', $request->session()->getId())
            ->delete();
    }

    public function store(Request $request)
    {
        $user = User::findOrFail(\Auth::user()->id);
        $request->validate([
            'image' => 'required|image|max:2048' // Assuming maximum file size is 2MB
        ]);

        $user = \Auth::user();
        if ($user->profile->avatar) {
            Storage::disk('public')->delete($user->profile->avatar);
        }

        // Store the new profile picture
        $imagePath = $request->file('image')->store('profile-pictures', 'public');
        $user->profile->avatar = $imagePath;
        $user->profile->save();
    }
}
