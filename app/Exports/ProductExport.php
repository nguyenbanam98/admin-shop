<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $product;

    public function __construct($product)
    {
        $this->product = $product;
    }
    public function collection()
    {
        // dd(Product::all());
        return $this->product;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Giá',
            'Image path',
            'Nội dung',
            'User id',
            'Category id',
            'Created at',
            'Updated at',
            'Image name',
            'Delete at',

        ];
    }
}
