<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatTableCoursLingeEtudiant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cour_linge_etudiant', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cour_l')->unsigned()->nullable();
            $table->integer('id_etudiant')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('id_cour_l')->references( 'id' )->on( 'cours_en_linge')->onDelete('cascade');
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
        //
    }
}
