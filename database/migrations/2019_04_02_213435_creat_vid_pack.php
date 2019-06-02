<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatVidPack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vid_packs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('video')->default('default.mp4');
            $table->integer('pack_id')->unsigned();
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
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
        Schema::dropIfExists('vid_packs');
    }
}
