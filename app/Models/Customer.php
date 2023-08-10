<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'birth_date',
        'occupation',
        'province',
        'city',
        'subdistrict',
        'village'
    ];

    protected $casts =  [
        'city' => 'json',
        'province' => 'json',
        'subdistrict' => 'json',
        'village' => 'json',
    ];
}
