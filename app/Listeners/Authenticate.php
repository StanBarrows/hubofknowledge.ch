<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;

class Authenticate
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
     * @param  object  $event
     * @return void
     */
    public function handle(Login $login)
    {
        try {
            $login->user->authentications()->create();
        }
        catch (\Exception $exception)
        {
            Log::error('App\Listener\Authenticate');
        }
    }
}
