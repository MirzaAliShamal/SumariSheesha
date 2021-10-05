<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Earning;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class EarningController extends Controller
{
    public function list()
    {
        $list = Earning::orderBy('id',"DESC")->get();
        return view('admin.earning.list', get_defined_vars());
    }

    public function view($id =null, $type = null)
    {
        //dd($id);
        if(is_null($type)){
            return redirect()->route('admin.order.view',$id);
        }else{
            return redirect()->route('admin.booking.view',$id);
        }
    }
}
