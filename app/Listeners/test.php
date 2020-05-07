<?php

namespace App\Listeners;

use App\Events\MessagePushed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class test
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
     * @param  test  $event
     * @return void
     */
    public function handle(MessagePushed $event)
    {
        return view('items.show');
    }
}
