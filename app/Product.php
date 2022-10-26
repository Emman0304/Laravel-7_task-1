<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'firstname',
        'lastname',
        'mname',
        'gender',
        'bday',
        'bplace',
        'contact',
        'address',
        'email',
    ];

    
}
