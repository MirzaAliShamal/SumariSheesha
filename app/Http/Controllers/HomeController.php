<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Notifications\EmailNotification;
use App\Notifications\UserNotification;
use DB;

class HomeController extends Controller
{
    public function home()
    {

        return view('front.home', get_defined_vars());
    }

    public function products($slug = null)
    {
        if (is_null($slug)) {
            $products = Product::where('status', true)->orderBy('created_at', 'DESC')->get();
            return view('front.products', get_defined_vars());
        } else {
            $product = Product::where('slug', $slug)->first();
            return view('front.product_detail', get_defined_vars());
        }
    }

    public function notification($id = null)
    {
        $notification = auth()->user()->notifications->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
            return redirect($notification->data['data']['action']);
        }
    }

    public function cart()
    {
        return view('front.cart', get_defined_vars());
    }

    public function checkout()
    {
        return view('front.checkout', get_defined_vars());
    }

    public function bookingForDelivery()
    {
        return view('front.booking', get_defined_vars());
    }

    // AJAX FUNCTIONS
    public function getBrands(Request $req)
    {
        $lat = $req->lat;
        $lng = $req->lng;
        $rad = 5;

        $brands = Brand::selectRaw("id, name, CAST(location_lat AS double) as lat, CAST(location_long AS double) as lng, ( 3956 * acos( cos( radians(?) ) * cos( radians( location_lat ) ) * cos( radians( location_long ) - radians(?) ) + sin( radians(?) ) * sin( radians( location_lat ) ) ) ) AS distance", [$lat, $lng, $lat])
            ->having("distance", "<=", $rad)->with('brand_products')->get()->toArray();

        return response()->json($brands, 200);
    }
}
