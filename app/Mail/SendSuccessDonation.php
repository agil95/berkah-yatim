<?php

namespace App\Mail;

use App\Donasi;
use App\Services\Sendgrid;
use Illuminate\Support\Facades\Log;

class SendSuccessDonation
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

            $subject = 'Terima kasih, ' . $donasi->nama;
    
            $content = view('emails.donation-success')
                ->withDonation($donasi)
                ->render();
    
            $return = Sendgrid::send($email, $subject, $content);
    
            Log::info($email);
            Log::info($return);
        }
    }
}
