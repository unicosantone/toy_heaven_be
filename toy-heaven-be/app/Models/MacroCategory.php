<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class MacroCategory extends Model
{
    protected $fillable = [
        'label_ita',
        'label_eng',

    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'macro_category_id', 'id');
    }

}
