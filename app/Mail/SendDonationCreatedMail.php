<?php

namespace App\Mail;

use App\Donasi;
use App\Services\Sendgrid;
use Illuminate\Support\Facades\Log;

class SendDonationCreatedMail
{
    public $donation;

    public function __construct(Donasi $donasi)
    {
        $this->donation = $donasi;        
    }

    public static function send($donasi)
    {
        $email = $donasi->email;

        if ($email) {

            $subject = 'Mohon selesaikan transaksi donasimu';
    
            $content = view('emails.donation-created')
                ->withDonation($donasi)
                ->render();

            $return = Sendgrid::send($email, $subject, $content);
    
            Log::info($email);
            Log::info($return);
        }
    }
}
