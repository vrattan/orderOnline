<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealtimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mealtimes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mealtime_name');
            $table->time('start_time');
            $table->time('end_time');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->timestamps('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mealtimes');
    }
}
