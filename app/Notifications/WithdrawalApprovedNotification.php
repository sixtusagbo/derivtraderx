<?php

namespace App\Notifications;

use App\Models\UserWithdrawals;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WithdrawalApprovedNotification extends Notification
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
            ->subject('Congratulations, Withdrawal Successful✅')
            ->line('Your withdrawal of $' . number_format($this->withdrawal->amount, 2) . ' has been approved and has been sent to your trading wallet.')
            ->line('Withdrawal address: ' . $this->withdrawal->withdrawalAdd->address)
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
