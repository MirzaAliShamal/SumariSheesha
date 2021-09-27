<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Flavour;
use App\Models\Color;
use App\Models\BrandProduct;
use App\Models\Brand;
use Str;

class BrandProductController extends Controller
{
    public function list()
    {
        $list = BrandProduct::all();
        return view('admin.brand_product.list', get_defined_vars());
    }

    public function add()
    {
        $flavour = Flavour::where('status',1)->get();
        $color = Color::where('status',1)->get();
        $category = Category::where('status',1)->get();
        $brand = Brand::where('status',1)->get();
        return view('admin.brand_product.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $product = BrandProduct::orderBy('id', 'DESC')->first();
        if(is_null($id)){
            $list = new BrandProduct();
            $msg = ' Product saved successfully !';
            if( is_null($product) ){
                $list->uuid = 1001;
            }
            else{
                $list->uuid = $product->uuid + 1;
            }

        }
        else{
            $list =BrandProduct::find($id);
            $msg = ' Product updated successfully !';
        }
        if($req->file){

            $list->image = uploadFile($req->file, 'uploads/products');
        }
        $list->name = $req->name;
        $list->slug = Str::slug($req->name);
        $list->category_id = $req->category;
        $list->brand_id = $req->brand;
        $list->color_id = $req->color ;
        $list->flavour_id = $req->flavour ;
        $list->category_id = $req->category;
        $list->price = $req->price;
        $list->quantity = $req->quantity;
        $list->description = $req->description ?? 'none';
        $list->status = 1;
        $list->save();
        return redirect()->route('admin.brand_product.list')->with('success', $msg);
    }

    public function status($id = null)
    {
        $list = BrandProduct::find($id);
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
        $list = BrandProduct::find($id);
        $list->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function edit($id = null)
    {
        $list = BrandProduct::find($id);
        $flavour = Flavour::where('status',1)->get();
        $color = Color::where('status',1)->get();
        $category = Category::where('status',1)->get();
        $brand = Brand::where('status',1)->get();
        //dd($brand);
        return view('admin.brand_product.edit',get_defined_vars());
    }
}
