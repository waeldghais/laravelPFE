<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatPayerTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_paiement')->unsigned();
            $table->integer('id_etudiant')->unsigned();
            $table->timestamps();
            $table->foreign('id_paiement')->references( 'id' )->on( 'paiements')->onDelete('cascade');
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
        Schema::dropIfExists('payers');
    }
}
