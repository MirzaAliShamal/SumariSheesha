<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }


    public function flavours(){
        return $this->belongsToMany('App\Models\Flavour');
    }

    public function colors(){
        return $this->belongsToMany('App\Models\Color');
    }

    public function subCategory() {
        return $this->belongsTo('App\Models\SubCategory');
    }

    public function images(){
        return $this->hasMany('App\Models\ProductImage');

    }
}
