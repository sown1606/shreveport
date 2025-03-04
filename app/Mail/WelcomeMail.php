<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // Thay vì $data, ta dùng $user

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $subject = 'Welcome';
        return $this->view('emails.welcome')
            ->subject($subject);
        // Dữ liệu để view emails.welcome có thể lấy từ $this->user
    }
}
