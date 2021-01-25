<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'active', 'position', 'name', 'name_en', 'slug'
    ];

    public function subcategories(): HasMany
    {
        return $this->hasMany('App\Models\Subcategory', 'category_id', 'id')->orderBy('position');
    }
}
