<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function sales() {
        return $this->belongsToMany(Sale::class, 'product_sales');
    }
}
