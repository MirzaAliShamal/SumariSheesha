<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Str;

class BrandController extends Controller
{
    public function list()
    {
        $list = Brand::orderBy('id', 'DESC')->get();
        return view('admin.brand.list', get_defined_vars());
    }

    public function add()
    {
        return view('admin.brand.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
        ]);

        if(is_null($id)){
            $list = new Brand();
            $msg = 'Brand saved successfully !';
        }
        else{
            $list =Brand::find($id);
            $msg = 'Brand updated successfully !';
        }
        $list->name = $req->name;
        $list->slug = Str::slug($req->name);
        $list->email = $req->email;
        $list->phone = $req->phone;
        $list->location = $req->location;
        $list->location_lat = $req->location_lat;
        $list->location_long = $req->location_long;
        $list->status = 1;
        $list->save();
        return redirect()->route('admin.brand.list')->with('success', $msg);
    }

    public function status($id = null)
    {
        $list = Brand::find($id);
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
        $list = Brand::find($id);
        $list->delete();
        return redirect()->back()->with('success', 'Brand deleted successfully');
    }

    public function edit($id = null)
    {
        $list = Brand::find($id);
        return view('admin.brand.edit',get_defined_vars());
    }
}
