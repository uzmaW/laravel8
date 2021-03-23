<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Mail\SendNewUserRegistrationNotification;

class NewUser
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
        //
    }

    public function sendNewUserRegistrationMail($user) 
    {
        try {
            if ($user instanceof User) {
                Mail::queue(new SendNewUserRegistrationNotification($user));
            }
        } catch (\Exception $e) {
            report($e);
        }
    }
}
