<?php

namespace App\Models;


use App\Models\ImageAssociation;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'description_ita',
        'description_eng',
        'link',
 
    ];

    public function imageAssociations()
    {
        return $this->hasMany(ImageAssociation::class)->where('type_entity', 1);
    }

    public function images()
    {
        return $this->hasManyThrough(Image::class, ImageAssociation::class, 'entity_id', 'id', 'id', 'image_id')->where('image_associations.type_entity', 1);
    }
}
