<?php

namespace App\Mail;

use App\Donasi;
use App\Services\Sendgrid;
use Illuminate\Support\Facades\Log;

class SendFirstSuccessDonation
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

            $subject = 'Bahagianya kami menyambut kedatangan dirimu';
    
            $content = view('emails.donation-first')
                ->withDonation($donasi)
                ->render();
    
            $return = Sendgrid::send($email, $subject, $content);
    
            Log::info($email);
            Log::info($return);
        }
    }
}
