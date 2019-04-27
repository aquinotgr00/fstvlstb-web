<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('transactions', 'payment_method')) {
        //do nothing
        }else{
            Schema::table('transactions', function (Blueprint $table) {
                $table->enum('payment_method', ['direct_bank_transfer', 'others'])->default('direct_bank_transfer');
            });
        
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('transactions', 'payment_method')) {
            Schema::table('transactions', function ($table) {
                $table->dropColumn('payment_method');
            });
        }
    }
}
