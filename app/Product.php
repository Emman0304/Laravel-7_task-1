<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Product extends Model
{
    protected $fillable = [
        'fname', 
        'mname',
        'lname', 
        'gender',
        'contact', 
        'email',
        'bday', 
        'bplace',
        'email',
        'address'

    ];
}