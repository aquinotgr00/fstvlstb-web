<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracklists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracklists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('content')->nullable();
            $table->string('preview')->nullable();
            $table->string('release_date')->nullable();
            $table->integer('counter')->default(0);
            $table->string('status')->default('disabled');
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
        Schema::dropIfExists('tracklists');
    }
}
