<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;

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
