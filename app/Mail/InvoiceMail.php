<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceMail extends Mailable
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
        return $this->subject('Test Invoice Mailgun')
            ->markdown('email.orders.invoice')
            ->with([
                'transaction' => $this->transaction
            ]);
    }
}
