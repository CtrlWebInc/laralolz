<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutings extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->datetime('starts_at');
            $table->datetime('ends_at')->nullable();
            $table->text('description')->nullable();

            $table->integer('conference_id')->unsigned()->nullable();
            $table->foreign('conference_id')->references('id')->on('conferences')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('venue_id')->unsigned()->nullable();
            $table->foreign('venue_id')->references('id')->on('venues')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('outings');
    }

}
