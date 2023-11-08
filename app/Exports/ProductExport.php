<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array
    {
        return[
            'id',
            'name',
            'price',
            'desription'
        ];
    }
    public function collection()
    {
        return Product::select('id', 'name', 'price', 'description')->get();
    }
}
