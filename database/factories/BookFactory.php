<?php

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(random_int(1,4)),
            'author' => $this->faker->name(),
            'price' => $this->faker->numberBetween(10,100) * 1000,
            'synopsis' => $this->faker->realText(200,2),
            'cover' => $this->faker->word()
        ];
    }
}
