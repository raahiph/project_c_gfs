<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catagories = [
            [
                'name' => 'Guarments',
            ],
            [
                'name' => 'Stationary',
            ],
            [
                'name' => 'Food',
            ]
        ];

        foreach ($catagories as $key => $value) {
            Category::create($value);
        }
    }
}
