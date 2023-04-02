<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Mockery\Exception;
use Illuminate\Support\Facades\Validator;
use App\Notifications\NewPostNotification;
use App\Models\Setting;
use App\User;
use App\Models\Notification;
use App\Models\Notifiy;
use App\Models\Token;
use App\Models\Language;

use Mail;


class NotificationMessageController extends Controller
{


    public function __construct()
    {
        $this->locales = Language::all();
        $this->settings = Setting::query()->first();
        view()->share([
            'locales' => $this->locales,
            'settings' => $this->settings,
        ]);
    }

    public function index(Request $request)
    {
        $items = Notification::query()->where('from_dashboard', 1)->groupBy('random_key')->latest()->paginate($this->settings->rows_pagination_count);
        return view('admin.notifications.home', ['items' => $items]);
    }




    public function create()
    {
        // $usersList = User::query()->where('status','active')/*->orderBy('name','ASC')*/->get();
        return view('admin.notifications.create');
    }



    public function store(Request $request)
    {
        $message = $request->message;
        
        $users = User::pluck('id')->toArray();
        
        $random_key = rand(1111111, 999999999);
        
        foreach($users as $one){
            $notifications= New Notification;
            $notifications->from_dashboard = 1;
            $notifications->random_key = $random_key;
            $notifications->user_id = $one;
            $notifications->message = $message;
            $notifications->save();
        }
        
        
        $this->fcmPush($message);
            

        return redirect()->route('admin.notifications.index')->with('status', __('cp.create'));

        
    }



    public function deleteByRandomKey($random_key)
    {
        $notifications = Notification::where('random_key', $random_key)->get();
        foreach($notifications as $one){
            $one->delete();
        }
            return redirect()->route('admin.notifications.index')->with('status', __('cp.deleted'));
    }



    public function destroy($id)
    {
        $notifications = Notification::query()->findOrFail($id);
        if ($notifications->delete()) {
            return 'success';
        }
        return 'fail';
    }



    

    function fcmPush($message)
    { 

    try {
        $headers = [
            'Authorization: key=AAAAW5jqyWM:APA91bGP8_YBLaR9tA5CYdFfZlmzW31s8zIei1sPoCBuCTG0yoZ0uoaHrjWC-lbg6GrcS-FR6rRako97Q7KQ4d-QzvYP0z86VVIPKJBw2ZGhh7VurD7LUANVhMbNcOtDu4VecSrsxpx8',
            'Content-Type: application/json'
        ];
        $notification= [
            "to"=> '/topics/AlraadApp',
            "notification"=>[
            'body' => $message,
                'type' => "notify",
                'title' => 'AlraadApp',
                'icon' => 'myicon',//Default Icon
                'sound' => 'mySound'//Default sound
            ]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notification));
        
        
        $result = curl_exec($ch);
        curl_close($ch);
    } catch (\Exception $ex) {
}
}



   

}
