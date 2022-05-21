<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'brand',
        'price',
        'colors',
        'gear_type',
        'year',
        'country',
        'is_new',
        'description',
    ];
}
