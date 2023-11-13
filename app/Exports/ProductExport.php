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
    protected $lists;
    function __construct($lists) 
    {
        $this->lists=$lists;
    }
    public function collection() {
        return $this->lists;
      }

    public function headings():array
    {
        return[
            'id',
            'name',
            'price',
            'desription'
        ];
    }

   
    
}
