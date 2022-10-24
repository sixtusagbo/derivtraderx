<?php

namespace App\Notifications;

use App\Models\PaymentAdd;
use App\Models\Plan;
use App\Models\UserPayments;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DepositCreatedNotification extends Notification
{
    use Queueable;

    protected $payment;

    /**
     * Create a new notification instance.
     *
     * @param UserPayments payment
     * @return void
     */
    public function __construct(UserPayments $payment)
    {
        $this->payment = $payment;
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
            ->greeting('Hello ' . $this->payment->user->username . ',')
            ->subject('Deposit Created')
            ->line('You have created a pending deposit of $' . $this->payment->amount . ' for the ' . $this->payment->plan->name . ' plan.')
            ->line('This payment is to be made to the ' . $this->payment->paymentAdd->name . ' address: ' . $this->payment->paymentAdd->address)
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
