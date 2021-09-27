<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;

class CategoryController extends Controller
{
    public function list()
    {
        $list = Category::all();
        return view('admin.category.list', get_defined_vars());
    }

    public function add()
    {
        return view('admin.category.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
        ]);

        if(is_null($id)){
            $list = new Category();
            $msg = 'Category saved successfully !';
        }
        else{
            $list =Category::find($id);
            $msg = 'Category updated successfully !';
        }
        $list->name = $req->name;
        $list->slug = Str::slug($req->name);
        $list->description = $req->description ?? 'none';
        $list->status = 1;
        $list->save();
        return redirect()->route('admin.category.list')->with('success', $msg);
    }

    public function status($id = null)
    {
        $list = Category::find($id);
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
        $list = Category::find($id);
        $list->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    public function edit($id = null)
    {
        $list = Category::find($id);
        return view('admin.category.edit',get_defined_vars());
    }
}
