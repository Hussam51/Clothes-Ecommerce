<?php

namespace App\Listeners;

use App\Events\CreateOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DecreaseProductQuantity
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateOrder $event): void
    {
        $order=$event->order;
        foreach($order->products as $product){
            $product->decrement('quantity',$order->pivot->quantity);
        }
    }
}
