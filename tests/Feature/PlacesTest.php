<?php

namespace Tests\Feature;

use App\Place;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class PlacesTest extends TestCase
{
    public function test_api_places_index_route()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user, 'api')
            ->get('/api/places')
            ->assertOk();
    }

    public function test_api_places_store_route()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user, 'api')
            ->post('/api/places', [
                'name' => 'La Jauría',
                'latitude' => 25,
                'longitude' => 50,
            ])
            ->assertJsonStructure([
                'name',
                'latitude',
                'longitude',
                'created_at',
                'updated_at',
            ])
            ->assertStatus(201);
    }

    public function test_api_places_show_route()
    {
        $user = factory(User::class)->make();

        $place = factory(Place::class)->create();

        $this->actingAs($user, 'api')
            ->get('/api/places/' . $place->id)
            ->assertJsonStructure([
                'name',
                'latitude',
                'longitude',
                'created_at',
                'updated_at',
            ])
            ->assertStatus(200);
    }

    public function test_api_places_update_route()
    {
        $user = factory(User::class)->make();

        $place = factory(Place::class)->create();

        $this->actingAs($user, 'api')
            ->put('/api/places/' . $place->id, [
                'name' => 'El Perraje',
                'latitude' => 30,
                'longitude' => 60,
            ])
            ->assertJsonStructure([
                'name',
                'latitude',
                'longitude',
                'created_at',
                'updated_at',
            ])
            ->assertStatus(200);
    }

    public function test_api_places_delete_route()
    {
        $user = factory(User::class)->make();

        $place = factory(Place::class)->create();

        $this->actingAs($user, 'api')
            ->delete('/api/places/' . $place->id)
            ->assertStatus(200);
    }
}
