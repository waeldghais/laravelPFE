<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatPacksTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titel')->unique();
            $table->text('content');
            $table->string('photo')->default('default.jpg');
            $table->decimal('prix', 8, 2)->nullable();
            $table->integer('user_id')->unsigned();
            $table->string('slug');
            $table->SoftDeletes();
            $table->timestamps();

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
        schema::dropIfExists('packs');
    }
}
