<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CoffeeLounge>
 */
class CoffeeLoungeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coffee_lounge_name' => $this->faker->word,
            'capacity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
