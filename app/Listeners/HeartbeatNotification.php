<?php

namespace App\Listeners;

use App\Events\Heartbeat;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class HeartbeatNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Heartbeat  $event
     * @return void
     */
    public function handle(Heartbeat $event)
    {
        // SOON
    }
}
