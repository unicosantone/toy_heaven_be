<?php

namespace App\Models;

use App\Models\Image;
use App\Models\SubCategory;
use App\Models\MacroCategory;
use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'label_ita',
        'label_eng',
        'parent_id'
    ];

  
    public function parentCategory(){
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function childCategories(){
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function products(){
        return $this->belongsToMany(Product::class,CategoryProduct::class, 'category_id', 'product_id');
    }

}
