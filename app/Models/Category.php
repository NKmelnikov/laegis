<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'active', 'position', 'name', 'name_en', 'slug'
    ];

    public function subcategories()
    {
        return $this->hasMany('App\Models\Subcategory')->orderBy('position');
    }
}
