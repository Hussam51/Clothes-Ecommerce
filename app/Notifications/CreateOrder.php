<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateOrder extends Notification
{
    use Queueable;
    public $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->subject("New Order")
        ->from("{{$this->order->address->email}}")
        ->line("a new reservation Created by.{{$this->order->address->first_name}}.' '.{{$this->order->address->last_name}}")
        ->action('Notification Url', url("admin/orders/.{{$this->order->id}}"))
        ->line('Thank you for using our application!');
    }


    public function toDatabase(object $notifiable)
    {
        return [
            'order_number'=>$this->order->number,
            'user_name'=>"{{$this->order->address->first_name}}.' '.{{$this->order->address->last_name}}",
            'url'=>url("admin/orders/.{{$this->order->id}}"),
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
