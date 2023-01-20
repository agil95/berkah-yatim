<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyAccountNotification extends Notification
{
    use Queueable;

    public $link;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        $this->link = $link;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($user)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($user)
    {
        $subject = 'Verifikasi Akun ' . config('app.name');
        
        return (new MailMessage)
            ->subject($subject)
            ->greeting($subject)
            ->line('Halo '.$user->name.'')
            ->line('Untuk mengaktifkan akun kamu di ' . config('app.name') .', silakan klik tombol dibawah ini ya.')
            ->action('Verifikasi Akun', $this->link)
            ->line('Terima kasih');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
