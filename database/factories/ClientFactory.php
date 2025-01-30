<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cust_id' => 1,
            'fullname' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->freeEmail(),
            'company' => $this->faker->unique()->company(),
            'country' => $this->faker->randomElement([
                'United States',
                'United Kingdom',
                'Canada',
                'Germany',
                'Australia',
                'India',
                'France',
                'United Kingdom',
                'Italy',
                'Brazil',
                'Japan',
                'South Korea',
                'Mexico',
                'Germany',
                'Ireland'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
