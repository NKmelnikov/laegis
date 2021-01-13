<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = [
        'active', 'brand_id','name', 'name_en', 'pdfPath','imgPath'
    ];

    public function brands(){
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
}
