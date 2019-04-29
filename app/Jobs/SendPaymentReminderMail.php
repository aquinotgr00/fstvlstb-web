<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\PaymentReminder;
use App\Transaction;
use Mail;

class SendPaymentReminderMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $items = Transaction::getToReminder(3);
        foreach ($items as $key => $value) {
            Mail::to($value->account->email)->send(new PaymentReminder($value));
            $increment = 1;
            $increment += intval($value->payment_reminder);
            $transaction = Transaction::find($value->id);
            $transaction->payment_reminder = $increment;
            $transaction->update();
        }
    }
}
