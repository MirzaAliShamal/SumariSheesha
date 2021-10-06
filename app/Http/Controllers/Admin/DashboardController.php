<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Earning;
use App\Models\Product;
use App\Models\Order;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $earning = Earning::sum('amount');
        $product = Product::whereStatus(true)->count();
        $pro_out_stock = Product::whereStatus(false)->count();
        $order = Order::count();
        $ordersList = Order::orderBy('id',"DESC")->take(10)->get();
        $booking = Booking::orderBy('id',"DESC")->take(10)->get();
        //dd($product);
        return view('admin.dashboard', get_defined_vars());
    }
}
