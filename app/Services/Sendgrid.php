<?php

namespace App\Services;

use GuzzleHttp\Client;

class Sendgrid
{
    public static function send($destination, $subject, $content)
    {
        $error = true;
        $message = 'ENV not set';
        $data = [];

        if (env('KITABISA_SANTET','https://santet.ktbs.io/') && $destination && $subject && $content) {

            $headers = [
                'Authorization'         => env('SANTET_AUTH', 'Basic c2FudGV0OiZCZ3J6cUZjNipzMjJLcA=='),
                'Content-Type'          => 'application/json',
            ];

            $payload = [
                'type' => 'sendgrid',
                'custom_param' => [
                    'otp_flag' => false,
                ],
                'destination' => $destination,
                'body' => [
                    'sender' => env('MAIL_FROM_ADDRESS', 'noreply@berkahyatim.com'),
                    'sender_name' => env('MAIL_FROM_NAME', 'Berkah Yatim'),
                    'subject' => $subject,
                    'content' => $content,
                ]
            ];
            
            $client = new Client(['base_uri' => env('KITABISA_SANTET','https://santet.ktbs.io/')]);

            try {

                $response = $client->post('message/notify', [
                    'headers' => $headers,
                    'json' => $payload
                ]);

                if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                    $error = false;
                    $message = 'Success';
                    $data = json_decode($response->getBody(), true);
                }

            } catch (\Throwable $th) {
                $message = $th->getMessage();
            }
        }

        return compact('error', 'message', 'data');
    }   
}
