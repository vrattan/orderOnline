<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkinghoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workinghours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id');
            $table->integer('weekday');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->tinyInteger('status');
            $table->string('type');
            $table->timestamps();
            // $table->timestamps('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workinghours');
    }
}
