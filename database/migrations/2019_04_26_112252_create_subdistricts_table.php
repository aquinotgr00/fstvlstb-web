<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubdistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdistricts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('city_id');
            $table->timestamps();
        });

        Artisan::call('db:seed', [
            '--class' => SubdistrictsTableSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subdistricts');
    }
}
