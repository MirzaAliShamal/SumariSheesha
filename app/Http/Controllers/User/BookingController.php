<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandProduct;
use Gloudemans\Shoppingcart\Facades\Cart;

class BookingController extends Controller
{
    public function addBooking(Request $req)
    {
        // Cart::instance('booking')->destroy();
        // return false;
        $list = BrandProduct::find($req->id);
        $cart = Cart::instance('booking')->add($list->id, $list->name,1, $list->price,['date'=>$req->date, 'time'=>$req->time],0);

        $total = Cart::instance('booking')->total();
        $content = Cart::instance('booking')->content();
        // dd($content);
        if($cart){
            return response()->json([
               'status' => true,
               'total' => $total,
               'content' =>$content,
               'html' => view('ajax.booking', get_defined_vars())->render(),
               'footer' => view('ajax.booking_cart_footer', get_defined_vars())->render(),
           ]);
        }
        else{
            return response()->json([
                'status' => false,
            ]);
        }
    }

    public function remove(Request $req)
    {
        // dd($req->all());
        $cart = Cart::instance('booking')->remove($req->id);
        $total = Cart::instance('booking')->total();
        $content = Cart::instance('booking')->content();

        return response()->json([
            'status' => true,
            'total' => $total,
            'content' =>$content,
            'html' => view('ajax.booking', get_defined_vars())->render(),
            'footer' => view('ajax.booking_cart_footer', get_defined_vars())->render(),
        ]);
    }

    public function checkout()
    {
        $user = auth()->user();
        return view('front.booking_checkout', get_defined_vars());
    }
}
