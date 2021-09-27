<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use Str;

class ColorController extends Controller
{
    public function list()
    {
        $list = Color::all();
        return view('admin.color.list', get_defined_vars());
    }

    public function add()
    {
        return view('admin.color.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
        ]);

        if(is_null($id)){
            $list = new Color();
            $msg = 'Color saved successfully !';
        }
        else{
            $list =Color::find($id);
            $msg = 'Color updated successfully !';
        }
        $list->name = $req->name;
        $list->slug = Str::slug($req->name);
        $list->description = $req->description ?? 'none';
        $list->status = 1;
        $list->save();
        return redirect()->route('admin.color.list')->with('success', $msg);
    }

    public function status($id = null)
    {
        $Color = Color::find($id);
        //dd($flavour);
        if($Color->status){
            $Color->status = 0;
        }
        else{
            $Color->status = 1;
        }
        $Color->save();
        return redirect()->back()->with('success','Status changed succesfully');
    }

    public function delete($id = null)
    {
        $color = Color::find($id);
        $color->delete();
        return redirect()->back()->with('success', 'Color deleted successfully');
    }

    public function edit($id = null)
    {
        $list = Color::find($id);
        return view('admin.color.edit',get_defined_vars());
    }
}
