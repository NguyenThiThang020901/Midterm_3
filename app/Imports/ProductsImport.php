<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 
        return new Product([
            'name' =>$row['name'],
            'id_type' =>$row['id_type'],
            'description' =>$row['description'],
            'unit_price' =>$row['unit_price'],
            'promotion_price' =>$row['promotion_price'],
            'image' =>$row['image'],
            'unit' =>$row['unit'],
            'new' =>$row['new'],

        ]);
    }
}
