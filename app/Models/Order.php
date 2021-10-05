<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function orderItem()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
    public function logable()
    {
        return $this->morphMany('App\Models\Earning', 'logable');
    }
}
