<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnPaymentProof extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('payment_proofs', 'token')) {
            Schema::table('payment_proofs', function (Blueprint $table) {
                $table->unique('token');
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
        Schema::table('payment_proofs', function (Blueprint $table) {
            $table->dropUnique('products_token_unique');
        });
    }
}
