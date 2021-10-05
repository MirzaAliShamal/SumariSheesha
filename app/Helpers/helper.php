<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\BrandProduct;
use App\Models\Earning;
use App\Models\Order;
use Carbon\Carbon;

function uploadFile($file, $path){
    $name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
    $file->move($path,$name);
    return $path.'/'.$name;
}

function countries() {
    return Country::orderBy('name', 'ASC')->get();
}

function getProductDetails($id){
    $product = Product::find($id);
    return $product;
}
function getBrandPrdDetails($id){
    $product = BrandProduct::find($id);
    return $product;
}
function orders(){
    $last_30_days = Carbon::now()->subDays(30);
    $last_60_days =  Carbon::now()->subDays(60);
    $count_30_days = Order::where('created_at','>',$last_30_days)->count();
    $count_60_days = Order::whereDate('created_at','>=',$last_60_days)->wheredate('created_at','<=',$last_30_days)->count();
    if($count_30_days > $count_60_days){
        if($count_60_days > 0){
            $percentage = $count_30_days - $count_60_days;
            $percentage = $percentage /$count_30_days*100;
            $percentage = round($percentage,2);
            // dd($percentage);
            $result =array(
                'arrow'=>'up',
                'percentage'=>$percentage,
            );
        }
        else{
            $result =array(
                'arrow'=>'up',
                'percentage'=>100,
            );
        }

    }else{
        $percentage = $count_60_days - $count_30_days;
        $percentage = $percentage /$count_60_days*100;
        $percentage = round($percentage,2);
        $result =array(
            'arrow'=>'down',
            'percentage'=>$percentage,
        );
    }
    return $result;
}

function earnings(){
    $last_30_days = Carbon::now()->subDays(30);
    $last_60_days =  Carbon::now()->subDays(60);
    $count_30_days = Earning::where('created_at','>',$last_30_days)->sum('amount');
    $count_60_days = Earning::whereDate('created_at','>=',$last_60_days)->wheredate('created_at','<=',$last_30_days)->sum('amount');
    if($count_30_days > $count_60_days){
        if($count_60_days > 0){
            $percentage = $count_30_days - $count_60_days;
            $percentage = $percentage /$count_30_days*100;
            $percentage = round($percentage,2);
            // dd($percentage);
            $result =array(
                'arrow'=>'up',
                'percentage'=>$percentage,
            );
        }
        else{
            $result =array(
                'arrow'=>'up',
                'percentage'=>100,
            );
        }

    }else{
        $percentage = $count_60_days - $count_30_days;
        $percentage = $percentage /$count_60_days*100;
        $percentage = round($percentage,2);
        $result =array(
            'arrow'=>'down',
            'percentage'=>$percentage,
        );
    }
    return $result;
}
