<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;
class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::factory()->times(20)->create();
        // $sales = [
        //     [
        //         'product_id' => 1,
        //         'customer_id' => 1,
        //         'location' => fake()->unique()->address,
        //         'payment_status' => 1,
        //         'payment_method' => 'Cash',
        //         'quantity' => 1,
        //         'total_amount' => 120,
        //         'total_paid' => 120,
        //         'total_dues' => 0,
        //         'status' => 'Requested',
        //         'shipping_details' => 'Gulshan Iqbal',
        //         'notes' => '',
        //         'user_id' => 3,
        //         'delivery_image' => '',
        //     ],[
        //         'product_id' => 2,
        //         'customer_id' => 2,
        //         'location' => fake()->unique()->address,
        //         'payment_status' => 1,
        //         'payment_method' => 'Cash',
        //         'quantity' => 1,
        //         'total_amount' => 150,
        //         'total_paid' => 150,
        //         'total_dues' => 0,
        //         'status' => 'Requested',
        //         'shipping_details' => 'Gulshan Iqbal',
        //         'notes' => '',
        //         'user_id' => 3,
        //         'delivery_image' => '',
        //     ],
        //     [
        //         'product_id' => 2,
        //         'customer_id' => 2,
        //         'location' => fake()->unique()->address,
        //         'payment_status' => 1,
        //         'payment_method' => 'Cash',
        //         'quantity' => 1,
        //         'total_amount' => 150,
        //         'total_paid' => 150,
        //         'total_dues' => 0,
        //         'status' => 'Approved',
        //         'shipping_details' => 'Gulshan Iqbal',
        //         'notes' => '',
        //         'user_id' => 4,
        //         'delivery_image' => '',
        //     ],
        //     [
        //         'product_id' => 2,
        //         'customer_id' => 2,
        //         'location' => fake()->unique()->address,
        //         'payment_status' => 1,
        //         'payment_method' => 'Cash',
        //         'quantity' => 1,
        //         'total_amount' => 150,
        //         'total_paid' => 150,
        //         'total_dues' => 0,
        //         'status' => 'Delivered',
        //         'shipping_details' => 'Gulshan Iqbal',
        //         'notes' => '',
        //         'user_id' => 4,
        //         'delivery_image' => '',
        //     ],
        // ];

        // foreach ($sales as $key => $value) {
        //     Sale::create($value);
        // }
    }
}
