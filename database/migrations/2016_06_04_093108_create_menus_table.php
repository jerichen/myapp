<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id');
            $table->string('url', 100)->nullable();
            $table->string('icon', 50)->nullable();
            $table->string('permission', 100)->nullable();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->enum('open', ['New', 'Same'])->default('Same')->nullable();
            $table->boolean('has_sub')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('status')->default('1')->nullable();
            $table->softDeletes()->nullable();
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
        Schema::drop('menus');
    }
}
