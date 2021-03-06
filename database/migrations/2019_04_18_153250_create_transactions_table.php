<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('subdistrict_id');
            $table->unsignedInteger('account_id');
            $table->text('address');
            $table->integer('postal_code');
            $table->integer('quantity');
            $table->integer('amount');
            $table->text('note')->nullable();
            $table->enum('status',['unpaid','paid'])->default('unpaid');
            $table->string('courier_name')->nullable();
            $table->string('courier_type')->nullable();
            $table->string('courier_fee')->nullable();
            $table->dateTime('payment_duedate')->nullable();
            $table->integer('payment_reminder')->default(0);
            $table->enum('payment_method', ['direct_bank_transfer', 'others'])->default('direct_bank_transfer');
            $table->enum('payment_bank', ['BCA', 'BNI', 'Mandiri'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
