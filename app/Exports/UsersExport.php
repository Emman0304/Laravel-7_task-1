<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements FromCollection,WithHeadings,WithEvents
{
    public function headings(): array
    {
        return [
            'Lastname',
            'firstname',
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
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getStyle('A1:J1')
                                ->getFont()
                                ->setBold(true);
   
            },
        ];
    }

}
