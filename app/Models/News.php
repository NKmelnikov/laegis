<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'slug', 'active', 'position', 'title', 'title_en', 'shortText', 'shortText_en', 'article', 'article_en', 'imgPath',
    ];
}
