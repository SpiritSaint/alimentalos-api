<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_photo', function (Blueprint $table) {
            $table->integer('photo_id')->unsigned()->nullable();
            $table->foreign('photo_id')->references('id')
                ->on('photos')->onDelete('cascade');

            $table->integer('pet_id')->unsigned()->nullable();
            $table->foreign('pet_id')->references('id')
                ->on('pets')->onDelete('cascade');

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
        Schema::dropIfExists('pet_photo');
    }
}
