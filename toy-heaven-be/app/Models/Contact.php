<?php

namespace App\Models;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'label_ita',
        'label_eng',
        'value',
        'link',
        'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

}
