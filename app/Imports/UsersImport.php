<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
           'name'     => $row[0],
           'mname'    => $row[1],
           'gender'   => $row[2],
           'bday'     => $row[3], 
           'bplace'   => $row[4],
           'contact'  => $row[5], 
           'email'    => $row[6],
           'address'  => $row[7]
        ]);
    }
}
