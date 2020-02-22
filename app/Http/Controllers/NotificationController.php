<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Notification;


class NotificationController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }


    public function booking_user($id){

        $user = User::find($id);

        return view('notification.send', compact('user'));
    }


    public function send_msg(Request $request){

        // $user = User::find($id);
        // dd($user->toArray());



        $msg = new Notification;

        $msg->user_name = $request->user_name;
        $msg->message = $request->message;
        $msg->booking_date = $request->booking_date;

        // dd($msg->toArray());

        $msg->save();

        return redirect('/');
    }



    public function show($id){
        
        $message = Notification::find($id);
        
        return view('notification.show', compact('message'));
    }
    
    public function confirm_booking($id){
        
        $notification_id = Notification::find($id);

        if ($notification_id->status == 0) {
            $notification_id->status = 1;
        } else {
            $notification_id->status = 0;
        }

        $notification_id->save();

        return redirect()->back();

    }
}
