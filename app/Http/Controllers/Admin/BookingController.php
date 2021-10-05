<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;


class BookingController extends Controller
{
    public function list()
    {
        $list = Booking::orderBy('id', 'DESC')->get();
        return view('admin.booking.list', get_defined_vars());
    }

    public function status($id = null)
    {
        $booking = Booking::find($id);
        //dd($flavour);
        if($booking->status){
            $booking->status = 0;
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
