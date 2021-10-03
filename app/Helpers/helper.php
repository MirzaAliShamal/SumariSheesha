<?php

use App\Models\Category;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

function uploadFile($file, $path){
    $name = time().'-'.str_replace(' ', '-', $file->getClientOriginalName());
    $file->move($path,$name);
    return $path.'/'.$name;
}

function getProductDetails($id){
    $product = Product::find($id);
    return $product;
}
