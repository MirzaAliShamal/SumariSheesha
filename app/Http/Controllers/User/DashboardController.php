<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function order()
    {
        $orders = Order::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
        return view('user.dashboard',get_defined_vars());
    }
    public function booking()
    {
        $bookings = Booking::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
        return view('user.booking',get_defined_vars());
    }

    public function profile()
    {
        $user = auth()->user();
        return view('user.profile',get_defined_vars());

    }
    public function image(request $req)
    {
        $user = User::find(auth()->user()->id);
        $user->image = uploadFile($req->image , 'uploads/user');
        $user->save();
        return redirect()->back()->with('success','Image saved Successfully');
    }
    public function bio(request $req)
    {
        $id = auth()->user()->id;
        $req->validate([
            'name'=> 'required',
            'email'=> 'unique:users,email,'.$id,
        ]);
        $user = User::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();
        return redirect()->back()->with('success','Bio Updated Successfully');
    }
    public function contact(request $req)
    {
        $id = auth()->user()->id;
        $req->validate([
            'phone'=> 'required',
        ]);
        $user = User::find($id);
        $user->phone = $req->phone;
        $user->save();
        return redirect()->back()->with('success','Phone number saved Successfully');
    }
    public function password(request $req)
    {
        $id = auth()->user()->id;
        $req->validate([
            'old_password' => 'required|password',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::find($id);
        $user->password = bcrypt($req->password);
        $user->save();
        return redirect()->back()->with('success','Password changed Successfully');
    }
}
