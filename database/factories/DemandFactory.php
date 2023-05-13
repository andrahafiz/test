<?php

namespace Database\Factories;

use App\Models\Gas;
use Illuminate\Database\Eloquent\Factories\Factory;

class DemandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->word(),
            'gas_id' => Gas::factory()->create()->id,
            'customer_id' => 1,
            'request_gas' => $this->faker->randomFloat(2, 0, 500),
            'received_gas' => $this->faker->randomFloat(2, 0, 500),
            'status' => $this->faker->randomElement(['Request', 'Progress', 'Done']),
        ];
    }
}
