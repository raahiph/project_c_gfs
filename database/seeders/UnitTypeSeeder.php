<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UnitType;
class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit_types = [
            [
                'name' => 'Kg',
            ],
            [
                'name' => 'Ltr',
            ]
        ];

        foreach ($unit_types as $key => $value) {
            UnitType::create($value);
        }
    }
}
