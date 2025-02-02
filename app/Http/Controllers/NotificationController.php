<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function showNotifications(User $user){
        return view('notifications',[
            'notifications' => $user->unreadNotifications
        ]);
    }

    public function markAsRead($id){

        $notification = auth()->user()->notifications()->find($id);

        if($notification){
            $notification->markAsRead();
        }

        return back();
    }

    // public function routeToChatify(){
    //     return redirect('/chatify');
    // }
}
