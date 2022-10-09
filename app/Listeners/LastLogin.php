<?php

namespace App\Listeners;

use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LastLogin
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
    public function handle($event)
    {
        $user = $event->user;

        // Update user last login timestamp
        $user->last_login = Carbon::now()->toDateTime();
        // Update user last login ip timestamp
        $user->last_login_ip = request()->getClientIp();
        // save the user in db
        $user->save();
    }
}
