<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => rand(1,3),
            'customer_id' => rand(1,3),
            'location' => fake()->unique()->address(),
            'payment_status' => 1,
            'payment_method' =>  fake()->randomElement(['Cash','Credit']),
            'quantity' => rand(1,100),
            'total_amount' => 150,
            'total_paid' => 150,
            'total_dues' => 0,
            'status' => fake()->randomElement(['Requested','Approved','Delivered']),
            'shipping_details' => 'Gulshan Iqbal',
            'notes' => fake()->text(10),
            'user_id' => rand(3,4),
            // 'delivery_image' => '',
            // 'updated_at' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'updated_at' => fake()->dateTimeBetween('-1 week', '+3 week')
        ];
    }
}
