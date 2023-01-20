<?php

namespace App\Services;


use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Mail;
use App\Repository\ActivationRepository;
use App\User;
use Illuminate\Notifications\Messages\MailMessage;
use App\Notifications\VerifyAccountNotification;

class ActivationService
{

    protected $mailer;

    protected $activationRepo;

    protected $resendAfter = 24;

    public function __construct(Mailer $mailer, ActivationRepository $activationRepo)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($user)
    {

        if ($user->activated || !$this->shouldSend($user)) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);

        $link = route('user.activate', $token);
        $mail = $user->notify(new VerifyAccountNotification($link));

        // Mail::send('emails.verify', ['link' => $link,'name'=>$user->email], function($mail) use($user) {
        //     $mail->to($user->email, 'no-reply')
        //          ->subject("Aktifkan Akun Berkah Yatim");
        //     $mail->from('noreply.berkahyatim@gmail.com', 'Berkah Yatim');        
        // });
        
        if ($mail) {
            return redirect()->back()->with('status', 'Email gagal diterima');
        }

    }

    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->status = 'active';
        $user->email_verified_at = date("Y-m-d H:i:s");

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;

    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}