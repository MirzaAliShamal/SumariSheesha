<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;

class CartController extends Controller
{
    public function addCart(Request $req, $qty = null)
    {
        // Cart::destroy();
        // return false;
        $list = Product::find($req->id);
        // if($list->quantity >= 1 && $list->quantity >= $req->qty){
            if( is_null($qty) ){
                if(count($list->images)>0){
                    $cart = Cart::instance('product')->add($list->id, $list->name, 1, $list->price,['image'=>$list->images->first()->image],0);
                }else{
                    $cart = Cart::instance('product')->add($list->id, $list->name, 1, $list->price,['image'=>''],0);

                }
                // $list->quantity = $list->quantity - 1;
                // $list->save();
            }
            else{
                // $list->quantity = $list->quantity - $qty;
                // $list->save();
                if(count($list->images)>0){
                    $cart = Cart::instance('product')->add($list->id, $list->name, $qty, $list->price,['image'=>$list->images->first()->image],0);
                }else{
                    $cart = Cart::instance('product')->add($list->id, $list->name, $qty, $list->price,['image'=>''],0);
                }
            }
            if(session('discount')){
                $cart_total = Cart::instance('product')->total();
                $cart_total = Str_replace(',','',$cart_total);
                $cart_total = floatval($cart_total);
                // $cart_price = $cart_get->price;
                // $cart_price = Str_replace(',','',$cart_price);
                // $cart_price = floatval($cart_price);
                $percent = setting('coupon_percentage');
                $discount_amount = $percent * $cart_total/ 100;
                $result = $cart_total - $discount_amount;
                //dd($result);
                Session::forget('discount');
                Session::forget('total');
                Session::put('total',$result);
                Session::put('discount',$discount_amount);
                $total = $result;
                $content = Cart::instance('product')->content();

                if($cart){

                    return response()->json([
                       'status' => true,
                       'total' => $total,
                       'content' =>$content,
                       'discount'=> $discount_amount,
                       'price' => Cart::instance('product')->total(),
                       'html' => view('ajax.cart', get_defined_vars())->render(),
                   ]);
                }
                else{
                    return response()->json([
                        'status' => false,
                    ]);
                }
           }
           else{
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
           }



            // dd($cart);
        // }
        // else{
        //     return response()->json([
        //         'error' => 404,
        //     ]);
        // }
    }

    public function removeCart(Request $req)
    {

        // dd($req->all());
        // $get_cart = Cart::instance('product')->get($req->id);
        // $product = Product::find($get_cart->id);
        // $product->quantity = $product->quantity + $get_cart->qty;
        // $product->save();
        $cart = Cart::instance('product')->remove($req->id);

        if(session('discount')){
            $cart_total = Cart::instance('product')->total();
            $cart_total = Str_replace(',','',$cart_total);
            $cart_total = floatval($cart_total);
            $percent = setting('coupon_percentage');
            $discount_amount = $percent * $cart_total/ 100;
            $result = $cart_total - $discount_amount;
            Session::forget('discount');
            Session::forget('total');
            Session::put('total',$result);
            Session::put('discount',$discount_amount);
            $total = $result;
            $content = Cart::instance('product')->content();

            return response()->json([
                'status' => true,
                'total' => $total,
                'content' =>$content,
                'discount' => $discount_amount,
                'price' => Cart::instance('product')->total(),
                'html' => view('ajax.cart', get_defined_vars())->render(),
                'view_cart' => view('ajax.view_cart', get_defined_vars())->render(),
            ]);
       }
       else{
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


    }

    public function updateCart(Request $req)
    {
        $list = Cart::instance('product')->get($req->id);
        $qty = $list->qty - 1;
        // dd($qty);
        if($list->qty > 1){
            // $product = Product::find($list->id);
            // $product->quantity = $product->quantity + 1;
            // $product->save();
            $cart = Cart::instance('product')->update($req->id,$qty);
            if(session('discount')){
                $cart_total = Cart::instance('product')->total();
                $cart_total = Str_replace(',','',$cart_total);
                $cart_total = floatval($cart_total);
                $percent = setting('coupon_percentage');
                $discount_amount = $percent * $cart_total/ 100;
                $result = $cart_total - $discount_amount;
                Session::forget('discount');
                Session::forget('total');
                Session::put('total',$result);
                Session::put('discount',$discount_amount);
                $total = $result;
                $content = Cart::instance('product')->content();

                return response()->json([
                    'status' => true,
                    'total' => $total,
                    'content' =>$content,
                    'discount' => $discount_amount,
                    'price' => Cart::instance('product')->total(),
                    'html' => view('ajax.cart', get_defined_vars())->render(),
                    'view_cart' => view('ajax.view_cart', get_defined_vars())->render(),
                ]);
           }
           else{
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
        }

    }

    public function coupon(Request $req)
    {
        $coupon = strtoupper(setting('coupon_code'));
        $code = strtoupper( $req->code);
        if($coupon == $code){
            $value = setting('coupon_percentage');
            return response()->json([
                'status'=>true,
                'value'=>$value,
            ]);
        }
        else{
            return response()->json([
                'status'=>false,

            ]);
        }
    }

    public function discount(Request $req){
        $total = $req->total;
        $discount = $req->discount;
         session(['discount' => $discount]);
         session(['total' => $total]);
        // dd(session('discount'));
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
