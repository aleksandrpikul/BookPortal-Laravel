<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookGenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'book_id' => $this->faker->numberBetween(1,30),
            'genre_id' => $this->faker->numberBetween(1,13),
        ];
    }
}
