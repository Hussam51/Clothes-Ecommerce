<?php

namespace App\Listeners;

use App\Events\CreateOrder;
use App\Repositories\CartInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmptyCart
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
            $cart=new CartInterface();
            $cart->empty();
    }
}
