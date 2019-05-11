<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variations extends Model
{
   protected $table = 'variations';

   protected $fillable = [
        'name',
        'value'
   ];

   protected $dates = ['created_at', 'updated_at'];

   public function product()
   {
       return $this->hasMany(Products::class, 'variation_id');
   }
}
