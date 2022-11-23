<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';

    public function products()
    {
        return $this->hasMany('App\Models\Products', 'id', 'product_id');
    }
}
