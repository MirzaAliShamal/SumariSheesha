<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Str;

class BlogCategoryController extends Controller
{
    public function list()
    {
        $list = BlogCategory::all();
        return view('admin.blog_category.list', get_defined_vars());
    }

    public function add()
    {
        return view('admin.blog_category.add', get_defined_vars());
    }

    public function edit($id = null)
    {
        $list = BlogCategory::find($id);
        return view('admin.blog_category.edit',get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
        ]);

        if(is_null($id)){
            $list = new BlogCategory();
            $msg = 'Blog Category saved successfully !';
        }
        else{
            $list = BlogCategory::find($id);
            $msg = 'Blog Category updated successfully !';
        }
        $list->name = $req->name;
        $list->slug = Str::slug($req->name);
        $list->description = $req->description ?? 'none';
        $list->status = 1;
        $list->save();
        return redirect()->route('admin.blog.category.list')->with('success', $msg);
    }

    public function status($id = null)
    {
        $list = BlogCategory::find($id);
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
        $list = BlogCategory::find($id);
        $list->delete();
        return redirect()->back()->with('success', 'Blog Category deleted successfully');
    }
}
