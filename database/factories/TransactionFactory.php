<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'receipt_id' => $this->faker->numberBetween(1,15),
            'book_id' => $this->faker->numberBetween(1,30),
            'price' => $this->faker->numberBetween(10,100) * 1000,
            'quantity' => $this->faker->numberBetween(1,10)
        ];
    }
}
