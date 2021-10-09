<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    public function list()
    {
        $list = SubCategory::all();
        return view('admin.sub_category.list', get_defined_vars());
    }

    public function add()
    {
        $list = Category::wherestatus(true)->get();
        return view('admin.sub_category.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
            'category' => 'required',
        ]);

        if(is_null($id)){
            $list = new SubCategory();
            $msg = 'Sub Category saved successfully !';
        }
        else{
            $list =SubCategory::find($id);
            $msg = 'Sub Category updated successfully !';
        }
        $list->name = $req->name;
        $list->category_id = $req->category;
        $list->slug = Str::slug($req->name);
        $list->description = $req->description ?? 'none';
        $list->save();
        return redirect()->route('admin.sub.category.list')->with('success', $msg);
    }



    public function delete($id = null)
    {
        $list = SubCategory::find($id);
        $list->delete();
        return redirect()->back()->with('success', 'Sub Category deleted successfully');
    }

    public function edit($id = null)
    {
        $list_category = Category::wherestatus(true)->get();
        $list = SubCategory::find($id);
        return view('admin.sub_category.edit',get_defined_vars());
    }
}
