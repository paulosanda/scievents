<?php

namespace App\Actions;

use App\Models\Person;
use App\Models\Participation;
use Illuminate\Support\Facades\DB;

class CreatePerson
{
    public function execute(array $data) : Person
    {
        return DB::transaction(function () use ($data) {
            $person = Person::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name']
            ]);

            foreach ($data['stage'] as $stage) {
                Participation::create([
                    'people_id' => $person->id,
                    'conference_room_id' => $stage['conference_room_id'],
                    'coffee_lounge_id' => $stage['coffee_lounge_id'],
                    'stage' => $stage['stage']
                ]);
            }

            return $person;
        });
    }
}
