<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentReminder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Undocumented variable
     *
     * @var object
     */
    private $transaction;

    /**
     * Create a new message instance.
     *
     * @param object $transaction
     * @return void
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Payment Reminder')
            ->markdown('email.orders.payment-reminder')->with([
                'transaction' => $this->transaction
            ]);
    }
}
