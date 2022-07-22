<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(3,5),
            'date' => $this->faker->dateTime()
        ];
    }
}
