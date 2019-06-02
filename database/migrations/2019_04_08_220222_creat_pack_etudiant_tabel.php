<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatPackEtudiantTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pack_etudiant', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pack')->unsigned()->nullable();
            $table->integer('id_etudiant')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('id_pack')->references( 'id' )->on( 'packs')->onDelete('cascade');
            $table->foreign('id_etudiant')->references( 'id' )->on( 'etudiants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pack_etudiant');
    }
}
