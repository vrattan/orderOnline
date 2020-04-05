<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('country_id');
            $table->string('currency_name',128);
            $table->string('currency_code',3);
            $table->string('currency_symbol',3);
            $table->decimal('currency_rate',15,8);
            $table->tinyInteger('symbol_position')->nullable();
            $table->char('thousand_sign',1);
            $table->char('decimal_sign',1);
            $table->char('decimal_position',1);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('currencies');
    }
}
