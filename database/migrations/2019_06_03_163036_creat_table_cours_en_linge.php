<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatTableCoursEnLinge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours_en_linge', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titel')->unique();
            $table->text('content');
            $table->string('photo')->default('default.jpg');
            $table->decimal('prix', 8, 2);
            $table->integer('matiere_id')->unsigned()->default(0);
            $table->integer('user_id')->unsigned();
            $table->string('slug');
            $table->SoftDeletes();
            $table->timestamps();

            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        chema::dropIfExists('cours_en_linge');
    }
}
