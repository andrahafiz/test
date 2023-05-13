<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'availability' => $this->faker->randomDigit(),
            'period' => $this->faker->date(),
            'status' => 1   
        ];
    }
}
