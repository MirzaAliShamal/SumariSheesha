<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Notifications\EmailNotification;

class BookingController extends Controller
{
    public function list()
    {
        $list = Booking::orderBy('created_at', 'DESC')->get();
        return view('admin.booking.list', get_defined_vars());
    }

    public function status($id = null)
    {
        $booking = Booking::find($id);
        //dd($flavour);
        if($booking->status){
            $booking->status = 0;
            $notif = User::find($booking->user_id);
            $email_data = [
                "subject" => "Your Booked item has been delivered",
                "view" => "user.booking_delivered",
                "details" => $booking,
                "user" => $notif,
            ];
            $notif->notify(new EmailNotification($email_data));


        }
        else{
            $booking->status = 1;
        }
        $booking->save();
        return redirect()->back()->with('success','Status changed succesfully');
    }

    public function view($id = null)
    {
        $list = Booking::where('id',$id)->get();
        return view('admin.booking.list', get_defined_vars());
    }
}
