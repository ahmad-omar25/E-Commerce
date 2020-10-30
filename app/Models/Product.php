<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable, SoftDeletes;

    protected $with = ['translations'];

    protected $translatedAttributes = ['name', 'description', 'short_description'];

    protected $guarded = [];

    protected $hidden = ['translations'];

    protected $casts = [
        'manage_stock' => 'boolean',
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'special_price_start',
        'special_price_end',
        'start_date',
        'end_date',
        'deleted_at',
    ];

    protected $slugAttribute = 'name';

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->withDefault();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'product_id');
    }

    // Get Active
    public function getActive() {
        return $this->is_active == 0 ? (__('dashboard.not_active')) : (__('dashboard.active'));
    }

    // Scope Active
    public function scopeActive($q) {
        return $q->where('is_active', 1);
    }
}
