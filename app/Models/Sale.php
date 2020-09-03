<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'product_sales');
    }
}
