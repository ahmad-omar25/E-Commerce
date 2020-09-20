<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];

    protected $guarded = [];

    protected $hidden = ['translations'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Get Active
    public function getActive() {
        return $this->is_active == 0 ? (__('dashboard.not_active')) : (__('dashboard.active'));
    }

    // Get Logo
    public function getLogoAttribute($val) {
        return ($val !== null) ? asset('assets/dashboard/images/brands/' . $val) : '';
    }
}
