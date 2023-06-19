<?php

namespace Tests\Feature;

use App\Models\CoffeeLounge;
use App\Models\Participation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CoffeeLoungeControllerTest extends TestCase
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
        CoffeeLounge::factory()->count(3)->create();

        $response = $this->actingAs($this->user)->get(route('coffee.lounges.index'));

        $response->assertOk();

        $response->assertViewIs('coffeelounge');

        $coffeeLounges = $response->viewData('coffeeLounges');
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Collection::class, $coffeeLounges);
        $this->assertCount(3, $coffeeLounges);
    }

    public function testeIndexAuthenticationFail()
    {
        CoffeeLounge::factory()->count(3)->create();

        $response = $this->get(route('coffee.lounges.index'));

        $response->assertStatus(302);

    }

    public function testStore()
    {
        $coffeeLoungeName = $this->faker->word;
        $capacity = $this->faker->numberBetween(1, 10);

        $response = $this->actingAs($this->user)->post(route('coffee.lounges.store'), [
            'coffee_lounge_name' => $coffeeLoungeName,
            'capacity' => $capacity,
        ]);

        $this->assertDatabaseHas('coffee_lounges', [
            'coffee_lounge_name' => $coffeeLoungeName,
            'capacity' => $capacity,
        ]);

        $response->assertRedirect(route('coffee.lounges.index'));
    }

    public function testStoreAuthenticationFail()
    {
        $coffeeLoungeName = $this->faker->word;
        $capacity = $this->faker->numberBetween(1, 10);

        $response = $this->post(route('coffee.lounges.store'), [
            'coffee_lounge_name' => $coffeeLoungeName,
            'capacity' => $capacity,
        ]);

        $response->assertStatus(302);
    }

    public function testShowMethod()
    {
        $coffeeLounge = CoffeeLounge::factory()->create();

        $response = $this->actingAs($this->user)->get(route('coffee.lounge.show', ['id' => $coffeeLounge->id]));

        $response->assertOk();

        $response->assertViewHas('coffeeLounge', $coffeeLounge);

        $response->assertViewIs('coffeeloungeparticipants');
    }
}
