<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable=[
        'maincategory'
    ];

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
