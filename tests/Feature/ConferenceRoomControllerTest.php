<?php

namespace Tests\Feature;

use App\Models\CoffeeLounge;
use App\Models\ConferenceRoom;
use App\Models\Participation;
use App\Models\Person;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConferenceRoomControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;


    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Crie um usuário autenticado
        $this->user = User::factory()->create();
    }

    public function testIndex()
    {
        ConferenceRoom::factory()->count(3)->create();

        $response = $this->actingAs($this->user)->get(route('conference.room.index'));

        $response->assertOk();

        $response->assertViewIs('conferenceroom');

        $conferenceRooms = $response->viewData('conferenceRooms');
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $conferenceRooms);
        $this->assertCount(3, $conferenceRooms);
    }

    public function testIndexAuthenticationFail()
    {
        ConferenceRoom::factory()->count(3)->create();

        $response = $this->get(route('conference.room.index'));

        $response->assertStatus(302);

    }

    public function testStore()
    {
        $roomName = $this->faker->word;
        $capacity = $this->faker->numberBetween(1, 10);

        $response = $this->actingAs($this->user)->post(route('conference.room.store'), [
            'room_name' => $roomName,
            'capacity' => $capacity,
        ]);

        $this->assertDatabaseHas('conference_rooms', [
            'room_name' => $roomName,
            'capacity' => $capacity,
        ]);

        $response->assertRedirect(route('conference.room.index'));
    }

    public function testStoreAuthenticationFail()
    {
        $roomName = $this->faker->word;
        $capacity = $this->faker->numberBetween(1, 10);

        $response = $this->post(route('conference.room.store'), [
            'room_name' => $roomName,
            'capacity' => $capacity,
        ]);

        $response->assertStatus(302);
    }

    public function testShowMethod()
    {
        $conferenceRoom = ConferenceRoom::factory()->create();

        $response = $this->actingAs($this->user)->get(route('conference.room.show', ['id' => $conferenceRoom->id]));

        $response->assertOk();

        $response->assertViewHas('conferenceRoom', $conferenceRoom);

        $response->assertViewIs('conferenceroomparticipants');
    }
}
