<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

    public function cart()
    {
        return view('front.cart', get_defined_vars());
    }

    public function checkout()
    {
        return view('front.checkout', get_defined_vars());
    }
}
