<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function list()
    {
        $list = Order::orderBy('id', 'DESC')->get();
        return view('admin.order.list', get_defined_vars());
    }

    public function status($id = null)
    {
        $order = Order::find($id);
        //dd($flavour);
        if($order->status){
            $order->status = 0;
        }
        else{
            $order->status = 1;
        }
        $order->save();
        return redirect()->back()->with('success','Status changed succesfully');
    }

    public function view($id = null)
    {
        $list = OrderItem::where('order_id',$id)->get();
        return view('admin.order.details', get_defined_vars());
    }
}
