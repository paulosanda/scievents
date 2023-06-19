<?php

namespace Database\Factories;

use App\Models\ConferenceRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConferenceRoomFactory extends Factory
{
    protected $model = ConferenceRoom::class;

    public function definition()
    {
        return [
            'room_name' => $this->faker->word,
            'capacity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
