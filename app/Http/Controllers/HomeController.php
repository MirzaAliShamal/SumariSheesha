<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('front.home', get_defined_vars());
    }

    public function products()
    {
        return view('front.products', get_defined_vars());
    }
}
