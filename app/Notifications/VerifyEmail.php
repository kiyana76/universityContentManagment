<?php
namespace App\Notifications;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    use Queueable;
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    // change as you want
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('فعالسازی حساب کاربری')
            ->view('emails.email-confirmation', ['user' => $this->user]);
    }
}
