<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $orders = Order::where('user_id',auth()->user()->id)->orderBy('id','DESC')->get();
        return view('user.dashboard',get_defined_vars());
    }
}
