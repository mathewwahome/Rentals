<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class ResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject(Lang::get('Reset Password Notification'))
                    ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
                    ->action(Lang::get('Reset Password'), url('password/reset', $this->token))
                    ->line(Lang::get('If you did not request a password reset, no further action is required.'));
    }
}
