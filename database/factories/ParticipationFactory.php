<?php

namespace Database\Factories;

use App\Models\Participation;
use App\Models\ConferenceRoom;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipationFactory extends Factory
{
    protected $model = Participation::class;

    public function definition()
    {
        return [
            'conference_room_id' => ConferenceRoom::factory(),
            'people_id' => Person::factory(),
            'stage' => $this->faker->randomElement(['1', '2']),
        ];
    }
}
