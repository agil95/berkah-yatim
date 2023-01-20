<?php

namespace App\Notifications;

use App\Mail\SendDonationCreatedMail;
use App\Mail\SendExpiredDonationMail;
use App\Mail\SendFirstSuccessDonation;
use App\Mail\SendInvoiceDonation;
use App\Mail\SendSuccessDonation;
use App\Services\Sendgrid;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoiceNotifcation extends Notification implements ShouldQueue
{
    use Queueable;

    public $typeNotif;
    public $firstDonation;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($donasi, $type = null, $first = false)
    {
        $this->typeNotif = $type;
        $this->firstDonation = $first;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        if($this->typeNotif == "wa") {
            $this->toWhatsapp($notifiable);
            return [];
        }
        else if ($notifiable->email!="") {
            $this->toSendgrid($notifiable);
            return [];
        } else {
            return ['mail'];
        }
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // $url = url('donasi-pembayaran?donasi=' . $notifiable->ref . '&snap_token=' . $notifiable->snap_token);
        // $urlbase = url('/');

        if ($notifiable->status == "success"|| $notifiable->status=="settlement") {

            $subject = 'Terima kasih, ' . $notifiable->nama;
            return (new MailMessage)
                ->subject($subject)
                ->view('emails.donation-success', ['donation' => $notifiable]);

        } elseif ($notifiable->status == 'success' && $this->firstDonation) {

            $subject = 'Terima kasih, ' . $notifiable->nama;
            return (new MailMessage)
                ->subject($subject)
                ->view('emails.donation-first', ['donation' => $notifiable]);

        } elseif ($notifiable->status == "expired") {

            $subject = 'Donasi kamu belum kami terima';
            return (new MailMessage)
                ->subject($subject)
                ->view('emails.donation-expired', ['donation' => $notifiable]);

        } elseif ($notifiable->status == "pending") {

            $subject = 'Terima kasih, ' . $notifiable->nama;
            return (new MailMessage)
                ->subject($subject)
                ->view('emails.donation-created', ['donation' => $notifiable]);

        } else {

            $subject = 'Invoice ' . $notifiable->invoice . '  Notification';
            return (new MailMessage)
                ->subject($subject)
                ->view('emails.donation-invoice', ['donation' => $notifiable]);
        }
    }

    public function toSendgrid($notifiable)
    {
        if ($notifiable->status == "success" || $notifiable->status=="settlement") {

            SendSuccessDonation::send($notifiable);

        } elseif ($notifiable->status == 'success' && $this->firstDonation) {

            SendFirstSuccessDonation::send($notifiable);

        } elseif ($notifiable->status == "expired"||$notifiable->status == "expire") {

            SendExpiredDonationMail::send($notifiable);

        } elseif ($notifiable->status == "pending") {

            SendDonationCreatedMail::send($notifiable);

        } else {
            
            SendInvoiceDonation::send($notifiable);
        }
    }

    public function toWhatsapp($notifiable)
    {
        if($notifiable->snap_token!=null)
           $url = url('donasi-pembayaran?donasi=' . $notifiable->ref . '&snap_tokn=' . $notifiable->snap_token);
        else
            $url = url('donasi-summary?ref=' . $notifiable->ref);

        $urlbase = url('/');

        $countryCode= '62';
        $newNumber = preg_replace('/^0?/', '+'.$countryCode, $notifiable->nohp);

        $data = [
            'phone' => $newNumber, // Receivers phone
            'body' => 'Hi '.$notifiable->nama.'!. Terima kasih telah berdonasi di program '.$notifiable->url.'!. Donasi anda dengan no. '.$notifiable->invoice.' berstatus '.$notifiable->status.' dan dapat dicek pada link '.$url , // Message
        ];
        $json = json_encode($data); // Encode data to JSON
        // URL for request POST /message
        $url = env('WA_API_URL', 'https://eu16.chat-api.com/instance180490/').'message?token='.env('WA_API_TOKEN', 'a1loy84i7yulv93a');
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
