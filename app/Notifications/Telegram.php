<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;


class Telegram extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ["telegram"];
    }

    public function toTelegram($notifiable) {

        return TelegramMessage::create()->to(-609061129)->content(
            "Новая заявка на служение!\nИмя: {$notifiable->name}\nТелефон: {$notifiable->tel}\nEmail: {$notifiable->email}\nСообщение: {$notifiable->message}"
        );
    }
}
