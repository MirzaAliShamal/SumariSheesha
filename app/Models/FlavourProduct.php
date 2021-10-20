<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlavourProduct extends Model
{
    use HasFactory;
    protected $guarded =[

    ];

    // public function flavour(){
    //     return $this->hasMany('App\Models\Flavour');
    // }
    // public function product(){
    //     return $this->hasMany('App\Models\Product');
    // }
}
