<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function save(Request $req)
    {
        // dd($req->all());
        foreach ($req->except('_token') as $key => $value) {
            $setting = Setting::whereName($key)->first() ?? new Setting();
            if ($req->hasFile($key)) {
                $image_path =  uploadFile($req->$key, 'uploads/cms',);
                $setting->name = $key;
                $setting->value = $image_path;
                $setting->save();
            } else{
                $setting->name = $key;
                $setting->value = $value;
                $setting->save();
            }
        }
        $msg = 'Settings Updated Successfully';
        return redirect()->back()->with('success', $msg);
    }

    public function general()
    {
        return view('admin.cms.general', get_defined_vars());
    }

    public function home()
    {
        return view('admin.cms.home', get_defined_vars());
    }

    public function coupon()
    {
        return view('admin.cms.coupon', get_defined_vars());
    }

    public function payment()
    {
        return view('admin.cms.payment', get_defined_vars());
    }
}
