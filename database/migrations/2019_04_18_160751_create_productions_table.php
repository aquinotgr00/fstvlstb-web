<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transaction_id');
            $table->unsignedInteger('production_batch_id')->nullable();
            $table->enum('status',['pending','wip','done','delivered','received','archived'])->default('pending');
            $table->date('delivery_date')->nullable();
            $table->string('tracking_number')->nullable();
	        $table->dateTime('received_confirmation')->nullable();
            $table->timestamps();
        });
        Schema::create('production_batches', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->integer('batch_qty')->nullable();
            $table->date('start_production_date')->nullable();
            $table->date('end_production_date')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('productions');
        Schema::dropIfExists('production_batches');
    }
}
