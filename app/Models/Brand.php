<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $fillable = [
        'active', 'position', 'slug', 'name', 'name_en', 'description', 'description_en', 'imgPath'
    ];

    public function catalogs(): HasMany
    {
        return $this->hasMany('App\Models\Catalog');
    }
}
