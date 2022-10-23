<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'name',
        'mname',
        'gender',
        'bday',
        'bplace',
        'contact',
        'address',
        'email',
        'password'
    ];

    
}
