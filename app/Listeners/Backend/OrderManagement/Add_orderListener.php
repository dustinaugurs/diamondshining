<?php

namespace App\Listeners\Backend\OrderManagement;

use App\Events\Backend\OrderManagement\Add_order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Add_orderListener
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
     * @param  Add_order  $event
     * @return void
     */
    public function handle(Add_order $event)
    {
        //
    }
}
