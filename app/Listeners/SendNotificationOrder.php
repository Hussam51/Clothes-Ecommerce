<?php

namespace App\Listeners;

use App\Events\CreateOrder;
use App\Notifications\CreateOrder as NotificationsCreateOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class SendNotificationOrder
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
       Notification::send(Auth::user(),new NotificationsCreateOrder($event->order));
    }
}
