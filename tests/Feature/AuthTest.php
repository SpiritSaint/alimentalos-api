<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_register_route()
    {
        $user = factory(User::class)->make();
        $password = substr(md5(mt_rand()), 0, 6);
        $response = $this->post('/register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);
        $response->assertRedirect('home');
        $this->assertDatabaseHas('users', [
            'email' => $user->email,
        ]);
    }
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
