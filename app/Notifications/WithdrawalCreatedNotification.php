<?php

namespace App\Notifications;

use App\Models\UserWithdrawals;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawalCreatedNotification extends Notification
{
    use Queueable;

    protected $withdrawal;

    /**
     * Create a new notification instance.
     *
     * @param UserWithdrawals withdrawal
     * @return void
     */
    public function __construct(UserWithdrawals $withdrawal)
    {
        $this->withdrawal = $withdrawal;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello ' . $this->withdrawal->user->username . ',')
            ->subject('Withdrawal Created')
            ->line('A pending withdrawal of $' . number_format($this->withdrawal->amount, 2) . ' has been created for your account.')
            ->line('If you did not create this withdrawal, contact us: hi@derivtraderx.com')
            ->line('If you created this withdrawal, no further action is required.')
            ->line('Thank you for investing with us 🚀');
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
