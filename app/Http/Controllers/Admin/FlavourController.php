<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Flavour;

class FlavourController extends Controller
{
    public function list()
    {
        $list = Flavour::all();
        return view('admin.flavour.list', get_defined_vars());
    }

    public function add()
    {
        return view('admin.flavour.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
        ]);

        if(is_null($id)){
            $flavour = new Flavour();
            $msg = 'Flavour saved successfully !';
        }
        else{
            $flavour =Flavour::find($id);
            $msg = 'Flavour updated successfully !';
        }
        $flavour->name = $req->name;
        $flavour->description = $req->description;
        $flavour->status = 1;
        $flavour->save();
        return redirect()->route('admin.flavour.list')->with('success', $msg);
    }

    public function status($id = null)
    {
        $flavour = Flavour::find($id);
        //dd($flavour);
        if($flavour->status){
            $flavour->status = 0;
        }
        else{
            $flavour->status = 1;
        }
        $flavour->save();
        return redirect()->back()->with('success','Status changed succesfully');
    }
}
