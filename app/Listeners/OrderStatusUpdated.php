<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\UpdateOrderStatus;

class OrderStatusUpdated
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
     * @param  ProcessOrder  $event
     * @return void
     */
    public function handle(UpdateOrderStatus $event)
    {
        //
    }
}
