<?php

namespace Tests\Feature;

use App\Actions\AvaliableLounges;
use App\Actions\AvaliableRooms;
use App\Actions\CreatePerson;
use App\Models\ConferenceRoom;
use App\Models\CoffeeLounge;
use App\Models\Person;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Tests\TestCase;

class ParticipationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testCreateMethod()
    {
        $response = $this->actingAs($this->user)->get(route('participations.create'));

        $response->assertOk();
        $response->assertViewIs('participations-create');
        $response->assertViewHasAll(['conferenceRooms', 'coffeeLounges']);
    }

    public function testStoreMethod()
    {
        $conferenceRoom = ConferenceRoom::factory()->create();
        $coffeeLounge = CoffeeLounge::factory()->create();

        $data = [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'stage' => [
                [
                    'conference_room_id' => $conferenceRoom->id,
                    'coffee_lounge_id' => $coffeeLounge->id,
                    'stage' => 1
                ]
            ]
        ];

        $response = $this->actingAs($this->user)->post(route('participations.store'), $data);

        $response->assertRedirect();
        $response->assertSessionHas('success_message');

        $person = $response->getSession()->get('person');
        $this->assertInstanceOf(Person::class, $person);
        $this->assertEquals($data['first_name'], $person->first_name);
        $this->assertEquals($data['last_name'], $person->last_name);
        $this->assertCount(1, $person->conferenceRooms);
        $this->assertCount(1, $person->coffeeLounges);
        $this->assertEquals($conferenceRoom->id, $person->conferenceRooms->first()->id);
        $this->assertEquals($coffeeLounge->id, $person->coffeeLounges->first()->id);
    }
}

