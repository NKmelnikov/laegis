<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    protected $fillable = [
        'active', 'category_id', 'position', 'name', 'name_en', 'slug'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
