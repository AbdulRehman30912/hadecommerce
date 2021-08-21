<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    protected $fillable=[
        'name','description','maincategory_id','platforms','brand_id'
    ];

    protected $casts = [
        'platforms' => 'array',
    ];

    public function maincategory()
    {
        return $this->hasMany(Categories::class,'id','maincategory_id');
    }

    public function brand()
    {
        return $this->BelongsTo(Brands::class);
    }
    public function image(){
        return $this->hasOne(ProductImage::class,'product_id','id');
    }

}
