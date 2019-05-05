<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'name',
        'product_group',
        'purchase_price',
        'sale_price',
        'purchase_vat',
        'sale_vat',
        'brand_id',
        'category_id',
        'image_url',
        'description',
        'product_code'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Products::class, 'category_id');
    }
}

