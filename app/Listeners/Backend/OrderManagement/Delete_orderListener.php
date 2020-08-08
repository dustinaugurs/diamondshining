<?php

namespace App\Listeners\Backend\OrderManagement;

use App\Events\Backend\OrderManagement\Delete_order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Delete_orderListener
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
     * @param  Delete_order  $event
     * @return void
     */
    public function handle(Delete_order $event)
    {
        //
    }
}
