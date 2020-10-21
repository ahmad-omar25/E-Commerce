<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'product_id', 'photo', 'created_at', 'updated_at'
    ];

//    public function products()
//    {
//        return $this->belongsToMany(Tag::class, 'product_tags');
//    }
}
