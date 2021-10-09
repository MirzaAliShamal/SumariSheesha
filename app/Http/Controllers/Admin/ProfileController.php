<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function view()
    {
        return view('admin.profile.profile', get_defined_vars());
    }
    public function save(Request $req)
    {
        $id = auth()->user()->id;
        $req->validate([
            'name'=> 'required',
            'email'=> 'unique:users,email,'.$id,
            'phone'=> 'required',
        ]);
        $user = User::find($id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->save();
        return redirect()->back()->with('success', 'Details updated Successfully!');
    }
    public function image(Request $req)
    {

        $user = User::find(auth()->user()->id);
        $user->image = uploadFile($req->image,'uploads/admin/dp');
        $user->save();
        return redirect()->back()->with('success', 'Image updated Successfully!');
    }

    public function password(Request $req)
    {
        $id = auth()->user()->id;
        $req->validate([
            'old_password' => 'required|password',
            'password' => 'required|min:8|confirmed',
        ]);
        $user = User::find($id);
        $user->password = bcrypt($req->password);
        $user->save();
        return redirect()->back()->with('success', 'password updated Successfully!');
    }
}
