<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'label_ita',
        'label_eng',
        'image_id',
        'category_id'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'sub_category_id','id');
    }
}
