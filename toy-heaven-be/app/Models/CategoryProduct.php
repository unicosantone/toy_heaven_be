<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    public $table = 'categories_products';
    protected $fillable = [
        'category_id',
        'product_id'
    ];

    public function category(){
        $this->belongsTo(Category::class,'category_id','id');
    }

    public function product(){
        $this->belongsTo(Product::class,'product_id','id');
    }
}
