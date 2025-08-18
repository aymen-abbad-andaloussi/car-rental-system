<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable =[
        'image',
        'name',
        'marque',
        'price',
        'city',
        'description'
    ];
}
