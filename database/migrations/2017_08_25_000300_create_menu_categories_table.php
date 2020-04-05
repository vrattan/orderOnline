<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create menu_categories table
 */
class CreateMenuCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('menu_categories', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->text('description')->nullable();
           $table->integer('parent_id')->nullable();
           $table->integer('priority')->default(0);
           $table->string('image')->nullable();
           $table->tinyInteger('status')->default(1);
           $table->string('permalink_slug')->unique()->nullable();
           $table->timestamps();
           $table->timestamps('deleted_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_categories');
    }
}