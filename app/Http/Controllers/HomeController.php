<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactQuery;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Product;
use App\Models\Brand;
use App\Models\BrandProduct;
use App\Notifications\EmailNotification;
use App\Notifications\UserNotification;
use DB;
use Session;
class HomeController extends Controller
{
    public function home()
    {
        $products = Product::where('status', true)->where('featured_on_home', true)->with('category')->get();
        return view('front.home', get_defined_vars());
    }

    public function products($category = null, $subcategory = null)
    {
        $products = Product::where('status', true)->where('quantity','>',3);
        if (!is_null($category)) {
            $products = $products->whereHas('category', function($q) use($category) {
                $q->where('slug', $category);
            });
        }
        if (!is_null($subcategory))  {
            $products = $products->whereHas('subCategory', function($u) use($subcategory) {
                $u->where('slug', $subcategory);
            });
        }

        $products = $products->orderBy('created_at', 'DESC')->get();
        return view('front.products', get_defined_vars());
    }

    public function productDetail($slug = null)
    {
        $product = Product::where('slug', $slug)->first();
        return view('front.product_detail', get_defined_vars());
    }

    public function blog($slug = null)
    {
        if (is_null($slug)) {
            $blogs = BlogPost::where('status', '3')
                ->with('blogCategory', 'user')
                ->orderBy('created_at', 'DESC')->paginate(16);

            return view('front.blog_post', get_defined_vars());
        } else {
            $blog = BlogPost::where('slug', $slug)->with('blogCategory', 'user')->first();

            return view('front.blog_detail', get_defined_vars());
        }
    }

    public function blogCategory($slug = null)
    {
        $blogs = BlogPost::where('status', '3')
            ->with('blogCategory', 'user')
            ->whereHas('blogCategory', function($q) use($slug) {
                $q->where('slug', $slug);
            })->orderBy('created_at', 'DESC')->paginate(16);

        return view('front.blog_post', get_defined_vars());
    }

    public function contact()
    {
        return view('front.contact', get_defined_vars());
    }

    public function contactSave(Request $req)
    {
        $req->validate([
            'name' => 'required|max:191',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required|max:191',
            'message' => 'required',
        ]);

        $contact = ContactQuery::create($req->except('_token'));

        return redirect()->back()->with('success', 'Your query has been successfully sent');
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
        $time =$req->time;
        $date =$req->date;

        Session::put('delivery_time',$time);
        Session::put('delivery_date',$date);

        $list = BrandProduct::whereHas('brand',function($q) use($lat,$lng,$rad) {
            $q->selectRaw("id, name, CAST(location_lat AS float) as lat, CAST(location_long AS float) as lng, ( 3956 * acos( cos( radians(?) ) * cos( radians( location_lat ) ) * cos( radians( location_long ) - radians(?) ) + sin( radians(?) ) * sin( radians( location_lat ) ) ) ) AS distance", [$lat, $lng, $lat])
            ->having("distance", "<=", $rad);
        })->get();
        // // dd($list);
        Session::put('brand_products_list',$list);
        // return response()->json([
        //             'status' => true,
        //         ]);
        $brands = Brand::selectRaw("id, name, CAST(location_lat AS float) as lat, CAST(location_long AS float) as lng, ( 3956 * acos( cos( radians(?) ) * cos( radians( location_lat ) ) * cos( radians( location_long ) - radians(?) ) + sin( radians(?) ) * sin( radians( location_lat ) ) ) ) AS distance", [$lat, $lng, $lat])
            ->having("distance", "<=", $rad)->with('brand_products')->get();
        if($brands){
        Session::put('brands',$brands);
            return response()->json([
                // 'brands' => $brands,
                'status' => true,
            ]);
        }
        else{
            return response()->json([
                'status' =>false,
            ]);
        }
    }

    public function getProds($id = null)
    {
        $list = BrandProduct::where('brand_id',$id)->get();
        return view('front.brand_products',get_defined_vars());
    }

    public function brandProducts($id = null)
    {
        Session::forget('brand_products_list');
        $products = BrandProduct::where('brand_id',$id)->get();
        return view('front.brand_products',get_defined_vars());
    }
}
