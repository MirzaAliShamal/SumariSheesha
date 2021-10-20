<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    use HasFactory;
    protected $guarded =[

    ];
    public function color(){
        return $this->hasMany('App\Models\Color');
    }
    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
