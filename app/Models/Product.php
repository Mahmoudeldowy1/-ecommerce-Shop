<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name_ar',
        'name_en',
        'price',
        'expiration_date',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id', 'id');
    }

}
