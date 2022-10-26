<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class UsersImport implements 
    ToModel, 
    WithHeadingRow,
    WithValidation,
    SkipsOnFailure
    // SkipsOnError
{
    use Importable,SkipsFailures;
    // SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Product([
           'lastname' => $row["lastname"],
           'firstname'=> $row["firstname"],
           'mname'    => $row["mi"],
           'gender'   => $row["gender"],
           'bday'     => $row["birthdate"], 
           'bplace'   => $row["birthplace"],
           'contact'  => $row["contact"], 
           'email'    => $row["email"],
           'address'  => $row["address"]
        ]);

    }
    public function rules(): array
    {
        return[
            '*.email' => ['email','unique:products,email'],
            '*.contact' => ['unique:products,contact']
        ];
    }
    // public function onFailure(Failure ...$failures)
    // {
        
    // }

}
