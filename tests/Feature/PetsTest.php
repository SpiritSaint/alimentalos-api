<?php

namespace Tests\Feature;

use App\Pet;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PetsTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_pets_index_route()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user, 'api')
            ->get('/api/pets')
            ->assertOk();
    }

    public function test_api_pets_store_route()
    {
        $user = factory(User::class)->make();

        $this->actingAs($user, 'api')
            ->post('/api/pets', [
                'name' => 'Beckam',
                'born_at' => '03-10-1994',
            ])
            ->assertJsonStructure([
                'name',
                'born_at',
                'created_at',
                'updated_at',
            ])
            ->assertStatus(201);
    }

    public function test_api_pets_show_route()
    {
        $user = factory(User::class)->make();

        $pet = factory(Pet::class)->create();

        $this->actingAs($user, 'api')
            ->get('/api/pets/' . $pet->id)
            ->assertJsonStructure([
                'name',
                'born_at',
                'created_at',
                'updated_at',
            ])
            ->assertStatus(200);
    }

    public function test_api_pets_update_route()
    {
        $user = factory(User::class)->make();

        $pet = factory(Pet::class)->create();

        $this->actingAs($user, 'api')
            ->put('/api/pets/' . $pet->id, [
                'name' => 'God',
            ])
            ->assertJsonStructure([
                'name',
                'born_at',
                'created_at',
                'updated_at',
            ])
            ->assertStatus(200);
    }

    public function test_api_pets_delete_route()
    {
        $user = factory(User::class)->make();

        $pet = factory(Pet::class)->create();

        $this->actingAs($user, 'api')
            ->delete('/api/pets/' . $pet->id)
            ->assertStatus(200);
    }
}
