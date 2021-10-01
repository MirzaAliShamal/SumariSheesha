<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addCart(Request $req, $qty = null)
    {
        // Cart::destroy();
        // return false;
        $list = Product::find($req->id);
        // if($list->quantity >= 1 && $list->quantity >= $req->qty){
            if( is_null($qty) ){
                $cart = Cart::add($list->id, $list->name, 1, $list->price,['image'=>$list->image,],0);
            }
            else{
                $cart = Cart::add($list->id, $list->name, $qty, $list->price,['image'=>$list->image],0);
            }
        // }
        // dd($cart->qty);
        // if($cart){
        //     if(){

        //     }
        //     $list->quantity = $list->quantity - $cart->qty;
        //     $list->save();
        // }
        $total = Cart::total();
        $content = Cart::content();
        //dd($content);
         //dd($total);
        if($cart){
            return response()->json([
               'status' => true,
               'total' => $total,
               'content' =>$content,
               'html' => view('ajax.cart', get_defined_vars())->render(),
           ]);
        }
        else{
            return response()->json([
                'status' => false,
            ]);
        }
    }

    public function removeCart(Request $req)
    {
        // dd($req->all());
        $cart = Cart::remove($req->id);
        $total = Cart::total();
        $content = Cart::content();

        return response()->json([
            'status' => true,
            'total' => $total,
            'content' =>$content,
            'html' => view('ajax.cart', get_defined_vars())->render(),
        ]);


    }

    public function checkoutCart()
    {
        $content = Cart::content();
        $total = strval(Cart::total());
        $total = str_replace(',','',$total);
            // dd($total);
        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->total = $total;
        $order->save();
        if($order){
            foreach($content as $list){
                $item = new OrderItem();
                $item->order_id = $order->id;
                $item->product_id = $list->id;
                $item->quantity = $list->qty;
                $item->price = $list->price;
                $item->total = $list->price * $list->qty;
                $item->save();
            }
        }
        if($item){
            Cart::destroy();
            return response()->json([
                'status' => true,
                'html' => view('ajax.cart', get_defined_vars())->render(),
            ]);
        }
        else{
            return response()->json([
                'status' => false,
            ]);
        }

    }
}
