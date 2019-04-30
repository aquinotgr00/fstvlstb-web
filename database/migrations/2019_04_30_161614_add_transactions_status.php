<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTransactionsStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            DB::statement("ALTER TABLE transactions CHANGE COLUMN status status ENUM('unpaid', 'paid', 'payment check', 'shipped', 'completed', 'cancel') NOT NULL DEFAULT 'unpaid'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            DB::statement("ALTER TABLE transactions CHANGE COLUMN status status ENUM('unpaid', 'paid') NOT NULL DEFAULT 'unpaid'");
        });
    }
}
