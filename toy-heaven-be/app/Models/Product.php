<?php

namespace App\Models;

use App\Models\Image;

use App\Models\Condition;
use App\Models\SubCategory;
use App\Models\ImageAssociation;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'code',
        'quantity',
        'name_ita',
        'name_eng',
        'year',
        'description_ita',
        'description_eng',
        'price',
        'in_evidence',
        'condition_id',
        'sub_category_id'
    ];


    public function categories(){
        return $this->belongsToMany(Category::class,CategoryProduct::class, 'product_id', 'category_id');
    }

    public function imageAssociations()
    {
        return $this->hasMany(ImageAssociation::class)->where('type_entity', 0);
    }

    public function images()
    {
        return $this->hasManyThrough(Image::class, ImageAssociation::class, 'entity_id', 'id', 'id', 'image_id')->where('image_associations.type_entity', 0);
    }
}
