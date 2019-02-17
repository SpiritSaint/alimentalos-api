<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BroadcastTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_broadcast_provider()
    {
        $this->artisan('heartbeat')->assertExitCode(0);
    }
}
