<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{

    protected $table ='products';

    protected $fillable=[
        'firstname',
        'lastname',
        'mname',
        'age',
        'gender',
        'bday',
        'bplace',
        'contact',
        'address',
        'email',
    ];

    public static function getStudents(){
        $records= DB::table('products')->select('firstname','lastname','mname','age','gender','bday','bplace','contact','email','address')->orderBy('id','asc')->get()->toArray();
        return $records;
    }
    
}
