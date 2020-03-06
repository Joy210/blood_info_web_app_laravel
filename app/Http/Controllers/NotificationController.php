<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $user_id = Auth::user()->id;

        $msg = new Notification;

        $msg->donor_id = $request->donor_id;
        $msg->booker_id = $user_id;
        $msg->message = $request->message;
        $msg->booking_date = $request->booking_date;

        // dd($msg->toArray());

        $msg->save();

        return redirect('/');
    }



    public function show($id){
        // dd($id);
        $test = Notification::find($id);

        // dd($message->toArray());
                    // ->leftjoin('users', 'users.id', '=', 'notifications.donor_id')
                    // ->get();
                    

        // dd($test->toArray());
        $donor_id = $test->donor_id;
        // dd($donor_id);

        $message = DB::table('users')
                   ->where('users.id', $donor_id)
                   ->leftjoin('notifications', 'users.id', '=', 'notifications.donor_id')
                   ->first()
                ;

        // dd($donor_id->toArray());
        
        
        // $message = Notification::where('id', $id)
        //             ->leftjoin('users', 'notifications.id', '=', 'users.id')
        //             ->first()
        // ;

        // $donor_id = $notification_id->donor_id;
        // $message = User::where('id', $donor_id)->first();

        // dd($message);
        
        return view('notification.show', compact('message'));
    }
    

    public function confirm_booking($id){
        
        $notification_id = Notification::find($id);
        $donor_id = $notification_id->donor_id;
        $user_id = User::where('id', $donor_id)->first();

        // $user_id->status = 1;
        // dd($user_id->toArray());
        
        
        if ($user_id->status == 0) {
            $user_id->status = 1;
        } else {
            $user_id->status = 0;
        }
        

        $user_id->save();

        return redirect('profile');

    }
}
