<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function user()
    {
        return  $this->belongsTo('App\Models\user');

    }
    public function brandProduct()
    {
        return  $this->belongsTo('App\Models\BrandProduct');

    }
    public function logable()
    {
        return $this->morphMany('App\Models\Earning', 'logable');
    }
}
