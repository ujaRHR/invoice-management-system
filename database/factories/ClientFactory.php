<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cust_id' => 1,
            'fullname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'company' => $this->faker->unique()->company(),
            'country' => $this->faker->unique()->country(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
