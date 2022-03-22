<?php

namespace App\Listeners;

use Mail;
use App\Events\SendReOrderEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailFired
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
     * @param  SendReOrderMail  $event
     * @return void
     */
    public function handle(SendReOrderEmail $event){
        Mail::send('emails.reorder', [], function($message) {
            $message->to('a.magdymedany@gmail.com');
            $message->subject('Re Order Students');
        });
    }
}
