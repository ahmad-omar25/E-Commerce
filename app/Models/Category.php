<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $fillable = ['parent_id', 'slug', 'is_active'];

    protected $hidden = ['translations'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    //
    public function scopeParent($q) {
        return $q->whereNull('parent_id');
    }

    // Get Sub Categories
    public function scopeChild($q) {
        return $q->whereNotNull('parent_id');
    }

    // Get Active
    public function getActive() {
        return $this->is_active == 0 ? (__('dashboard.not_active')) : (__('dashboard.active'));
    }
}
