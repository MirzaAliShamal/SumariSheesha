<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Flavour;
use App\Models\Color;
use App\Models\Product;
use Str;

class ProductController extends Controller
{
    public function list()
    {
        $list = Product::all();
        return view('admin.Product.list', get_defined_vars());
    }

    public function add()
    {
        $flavour = Flavour::where('status',1)->get();
        $color = Color::where('status',1)->get();
        $category = Category::where('status',1)->get();
        return view('admin.Product.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $product = Product::orderBy('id', 'DESC')->first();
        if(is_null($id)){
            $list = new Product();
            $msg = 'Product saved successfully !';
            if( is_null($product) ){
                $list->uuid = 1000001;
            }
            else{
                $list->uuid = $product->uuid + 1;
            }

        }
        else{
            $list =Product::find($id);
            $msg = 'Product updated successfully !';
        }
        if($req->file){

            $list->image = uploadFile($req->file, 'uploads/products');
        }
        $list->name = $req->name;
        $list->slug = Str::slug($req->name);
        $list->category_id = $req->category;
        $list->color_id = $req->color ;
        $list->flavour_id = $req->flavour ;
        $list->category_id = $req->category;
        $list->price = $req->price;
        $list->quantity = $req->quantity;
        $list->description = $req->description ?? 'none';
        $list->status = 1;
        $list->save();
        return redirect()->route('admin.product.list')->with('success', $msg);
    }

    public function status($id = null)
    {
        $list = Product::find($id);
        //dd($flavour);
        if($list->status){
            $list->status = 0;
        }
        else{
            $list->status = 1;
        }
        $list->save();
        return redirect()->back()->with('success','Status changed succesfully');
    }

    public function delete($id = null)
    {
        $list = Product::find($id);
        $list->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function edit($id = null)
    {
        $list = Product::find($id);
        $flavour = Flavour::where('status',1)->get();
        $color = Color::where('status',1)->get();
        $category = Category::where('status',1)->get();
        return view('admin.product.edit',get_defined_vars());
    }
}

