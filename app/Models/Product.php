<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // The attributes that are mass assignable
    protected $fillable = ['code', 'name', 'price'];

    // The attributes that should be cast to native types
    protected $casts = [
        'price' => 'decimal:2',
    ];
}
