<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Flavour;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Str;

class ProductController extends Controller
{
    public function list()
    {
        $list = Product::all();

        return view('admin.product.list', get_defined_vars());
    }

    public function add()
    {
        $flavour = Flavour::where('status',1)->get();
        $color = Color::where('status',1)->get();
        $category = Category::where('status',1)->whereHas('subCategories')->get();
        return view('admin.product.add', get_defined_vars());
    }

    public function sub(Request $req)
    {
        $subs = SubCategory::where('category_id', $req->id)->get();
        if($subs){
            return response()->json([
                'status'=> true,
                'html'=>view('ajax.sub_category',get_defined_vars())->render(),

            ]);
        }
    }
    public function save(Request $req, $id = null)
    {

        // dd($req->all());
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

        $list->name = $req->name;
        $list->slug = Str::slug($req->name);
        $list->category_id = $req->category;
        $list->sub_category_id = $req->sub_category;
        $list->color_id = $req->color ;
        $list->flavour_id = $req->flavour ;
        $list->category_id = $req->category;
        $list->price = $req->price;
        $list->quantity = $req->quantity;
        $list->description = $req->description ?? 'none';
        $list->meta_keywords = $req->meta_keywords;
        $list->meta_description = $req->meta_description;
        $list->status = 1;
        $list->save();
        if(is_null($id)){
            if($req->image){
                foreach(array_filter($req->image) as $image){
                    $pi= new ProductImage();
                    $pi->image = uploadFile($image, 'uploads/products');
                    $pi->product_id = $list->id;
                    $pi->save();
                }
            }
        }else{
            // $list->images()->delete();
            if($req->image){
                foreach(array_filter($req->image) as $image){
                    $pi= new ProductImage();
                    $pi->image = uploadFile($image, 'uploads/products');
                    $pi->product_id = $list->id;
                    $pi->save();
                }
            }
        }

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

    public function featuredStatus($id = null)
    {
        $list = Product::find($id);
        //dd($flavour);
        if($list->featured_on_home){
            $list->featured_on_home = 0;
        }
        else{
            $list->featured_on_home = 1;
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
        $category = Category::where('status',1)->whereHas('subCategories')->get();
        $subs = $list->category->subCategories;
        // dd($subs);
        return view('admin.product.edit',get_defined_vars());
    }

    public function deleteImage(Request $req)
    {
        $image = ProductImage::find($req->id);
        $image->delete();
        return response()->json(
            [
                'status'=> true,
            ]
        );
    }
}

