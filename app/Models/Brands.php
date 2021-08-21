<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $fillable = [
        'name', 'img',
    ];

    public function products()
    {
        return $this->hasMany(Products::class);
    }
    
}
