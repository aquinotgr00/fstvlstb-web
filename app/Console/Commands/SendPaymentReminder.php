<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Jobs\SendPaymentReminderMail;

class SendPaymentReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send payment reminder for all unpaid Transactions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        SendPaymentReminderMail::dispatch();
    }
}
