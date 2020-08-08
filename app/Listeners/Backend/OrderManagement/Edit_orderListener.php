<?php

namespace App\Listeners\Backend\OrderManagement;

use App\Events\Backend\OrderManagement\Edit_order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Edit_orderListener
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
     * @param  Edit_order  $event
     * @return void
     */
    public function handle(Edit_order $event)
    {
        //
    }
}
