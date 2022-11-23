<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function carts()
    {
        return $this->hasMany('App\Models\Cart', 'cart_id', 'cart_id');
    }
}
