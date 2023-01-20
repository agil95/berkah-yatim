<?php

namespace App\Notifications;

use App\Mail\SendDonationCreatedMail;
use App\Mail\SendExpiredDonationMail;
use App\Mail\SendFirstSuccessDonation;
use App\Mail\SendInvoiceDonation;
use App\Mail\SendSuccessDonation;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use GuzzleHttp;

class SendGridNotifcation
{

    public $typeNotif;
    public $firstDonation;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($donasi, $type = null, $first = false)
    {
        //
        $this->typeNotif = $type;
        $this->firstDonation = $first;
        $this->via($donasi);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if ($this->typeNotif == "wa")
            $this->toWhasApp($notifiable);
        else
            $this->toMail($notifiable);
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('donasi-summary-zakat?donasi=' . $notifiable->ref . '&snap_token=' . $notifiable->snap_token);
        $urlbase = url('');

        if ($notifiable->status == "pending") {

            SendDonationCreatedMail::send($notifiable);

        } elseif ($notifiable->status == 'success' && $this->firstDonation) {

            SendFirstSuccessDonation::send($notifiable);

        } elseif ($notifiable->status == 'success') {

            SendSuccessDonation::send($notifiable);

        } elseif ($notifiable->status == 'expire') {

            SendExpiredDonationMail::send($notifiable);

        } else {
            
            SendInvoiceDonation::send($notifiable);
        }
    }

    public function toWhasApp($notifiable)
    {
        $url = url('donasi-pembayaran?donasi=' . $notifiable->ref . '&snap_tokn=' . $notifiable->snap_token);
        $urlbase = url('');

        $countryCode= '62';
        $newNumber = preg_replace('/^0?/', '+'.$countryCode, $notifiable->nohp);

        $data = [
            'phone' => $newNumber, // Receivers phone
            'body' => 'Hi '.$notifiable->nama.'!. Terima kasih telah berdonasi di program '.$notifiable->url .'!. Donasi anda berstatus '.$notifiable->status.' dan dapat dicek pada link '.$url , // Message
        ];
        $json = json_encode($data); // Encode data to JSON
        // URL for request POST /message
        $url = 'https://eu127.chat-api.com/instance142138/message?token=v2bcyztxr3h0galc';
        // Make a POST request
        $options = stream_context_create(['http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/json',
                'content' => $json
            ]
        ]);
        // Send a request
        $result = file_get_contents($url, false, $options);
        return $result;
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
