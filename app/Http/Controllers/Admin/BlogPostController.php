<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Str;

class BlogPostController extends Controller
{
    public function list()
    {
        $list = BlogPost::all();
        return view('admin.blog_post.list', get_defined_vars());
    }

    public function add()
    {
        $categories = BlogCategory::where('status', true)->orderBy('name', 'ASC')->get();
        return view('admin.blog_post.add', get_defined_vars());
    }

    public function edit($id = null)
    {
        $list = BlogPost::find($id);
        $categories = BlogCategory::where('status', true)->orderBy('name', 'ASC')->get();
        return view('admin.blog_post.edit',get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'title' => 'required',
            'blog_category_id' => 'required',
            'body' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $user = auth()->user();

        if(is_null($id)){
            $req->validate([
                'featured_image' => 'required',
            ]);

            $list = new BlogPost();
            $msg = 'Blog Post saved successfully !';
        }
        else{
            $list = BlogPost::find($id);
            $msg = 'Blog Post updated successfully !';
        }
        $list->blog_category_id = $req->blog_category_id;
        $list->user_id = $user->id;
        if ($req->featured_image) {
            $image = $req->featured_image;
            $path = "blogs/".Str::slug($req->title);
            $filename = 'featured-'.Str::random(8).'.'.$image->getClientOriginalExtension();

            $image->move($path, $filename);

            $list->featured_image = $path.'/'.$filename;
        }
        $list->title = $req->title;
        $list->slug = $req->slug;
        $list->body = $req->body;
        if ($req->action == "publish") {
            $list->status = "3";
        }
        if ($req->action == "draft") {
            $list->status = "2";
        }
        $list->meta_title = $req->meta_title;
        $list->meta_keywords = $req->meta_keywords;
        $list->meta_description = $req->meta_description;
        $list->save();
        return redirect()->route('admin.blog.post.list')->with('success', $msg);
    }

    public function delete($id = null)
    {
        $list = BlogPost::find($id);
        $list->delete();
        return redirect()->back()->with('success', 'Blog Post deleted successfully');
    }

    public function status(Request $req, $id = null)
    {
        $list = BlogPost::find($id);
        $list->status = $req->status;
        $list->save();

        return redirect()->back()->with('success','Status changed succesfully');
    }
}
