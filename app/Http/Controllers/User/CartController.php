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
        if($list->quantity >= 1 && $list->quantity >= $req->qty){
            if( is_null($qty) ){
                $cart = Cart::instance('product')->add($list->id, $list->name, 1, $list->price,['image'=>$list->image,],0);
                $list->quantity = $list->quantity - 1;
                $list->save();
            }
            else{
                $list->quantity = $list->quantity - $qty;
                $list->save();
                $cart = Cart::instance('product')->add($list->id, $list->name, $qty, $list->price,['image'=>$list->image],0);
            }
            $total = Cart::instance('product')->total();
            $content = Cart::instance('product')->content();

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
            // dd($cart);
        }
        else{
            return response()->json([
                'error' => 404,
            ]);
        }
    }

    public function removeCart(Request $req)
    {
        // dd($req->all());
        $get_cart = Cart::instance('product')->get($req->id);
        $product = Product::find($get_cart->id);
        $product->quantity = $product->quantity + $get_cart->qty;
        $product->save();
        $cart = Cart::instance('product')->remove($req->id);
        $total = Cart::instance('product')->total();
        $content = Cart::instance('product')->content();

        return response()->json([
            'status' => true,
            'total' => $total,
            'content' =>$content,
            'html' => view('ajax.cart', get_defined_vars())->render(),
            'view_cart' => view('ajax.view_cart', get_defined_vars())->render(),
        ]);
    }

    public function updateCart(Request $req)
    {
        $list = Cart::instance('product')->get($req->id);
        $qty = $list->qty - 1;
        // dd($qty);
        if($list->qty > 1){
            $product = Product::find($list->id);
            $product->quantity = $product->quantity + 1;
            $product->save();
            $cart = Cart::instance('product')->update($req->id,$qty);
            $total = Cart::instance('product')->total();
            $content = Cart::instance('product')->content();

            return response()->json([
                'status' => true,
                'total' => $total,
                'content' =>$content,
                'html' => view('ajax.cart', get_defined_vars())->render(),
            ]);
        }

    }

    // public function checkoutCart()
    // {
    //     $content = Cart::content();
    //     $total = strval(Cart::total());
    //     $total = str_replace(',','',$total);
    //         // dd($total);
    //     $order = new Order;
    //     $order->user_id = auth()->user()->id;
    //     $order->total = $total;
    //     $order->save();
    //     if($order){
    //         foreach($content as $list){
    //             $item = new OrderItem();
    //             $item->order_id = $order->id;
    //             $item->product_id = $list->id;
    //             $item->quantity = $list->qty;
    //             $item->price = $list->price;
    //             $item->total = $list->price * $list->qty;
    //             $item->save();
    //         }
    //     }
    //     if($item){
    //         Cart::destroy();
    //         return response()->json([
    //             'status' => true,
    //             'html' => view('ajax.cart', get_defined_vars())->render(),
    //         ]);
    //     }
    //     else{
    //         return response()->json([
    //             'status' => false,
    //         ]);
    //     }

    // }
}
