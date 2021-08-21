<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable=[
        'product_id', 'full',
    ];

    // public function products()
    // {
    //     return $this->belongsTo(Products::class);
    // }
    public function setFullAttribute($value)
    {
        $this->attributes['full']= json_encode($value);
    }
}
