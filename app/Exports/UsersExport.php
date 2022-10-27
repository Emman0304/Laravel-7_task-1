<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return [
            'firstname',
            'lastname',
            'mi',
            'age',
            'gender',
            'birthdate',
            'birthplace',
            'contact',
            'email',
            'address'

        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(Product::getStudents());
        
    }

}
