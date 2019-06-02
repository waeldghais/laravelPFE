<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVidCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vid_cours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('video')->default('default.mp4');
            $table->integer('cour_id')->unsigned();
            $table->foreign('cour_id')->references('id')->on('cours')->onDelete('cascade');
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
        Schema::dropIfExists('vid_cours');
    }
}
