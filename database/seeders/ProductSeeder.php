<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Hand Free',
                'code' => 'abc',
                'unit_type_id' => 1,
                'units' => 2,
                'price' => 100,
                'current_stock' => 50,
                'category_id' => 1,
                'supplier_id' => 1,
                'description' => 'description',
                'storage_location' => 'storage_location',
                'status' => 1,
                'image' => 'handfree.png',
    ],[
                'name' => 'Silk Clothes',
                'code' => 'abc',
                'unit_type_id' => 1,
                'units' => 2,
                'price' => 100,
                'current_stock' => 50,
                'category_id' => 2,
                'supplier_id' => 1,
                'description' => 'description',
                'storage_location' => 'storage_location',
                'status' => 0,
                'image' => 'lotion.jpg',
    ],[
                'name' => 'Silk Clothes',
                'code' => 'abc',
                'unit_type_id' => 1,
                'units' => 2,
                'price' => 100,
                'current_stock' => 50,
                'category_id' => 3,
                'supplier_id' => 1,
                'description' => 'description',
                'storage_location' => 'storage_location',
                'status' => 1,
                'image' => 'shoes.jpg',
    ],

        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
