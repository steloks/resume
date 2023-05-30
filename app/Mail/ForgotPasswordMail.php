<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;
    private string $tempPass;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $tempPass)
    {
        $this->user = $user;
        $this->tempPass = $tempPass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): ForgotPasswordMail
    {
        return $this->view('admin.mails.forgot-password')->with(['user' => $this->user, 'tempPass' => $this->tempPass]);

    }
}
