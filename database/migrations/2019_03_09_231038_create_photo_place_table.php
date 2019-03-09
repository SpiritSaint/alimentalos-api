<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_place', function (Blueprint $table) {
            $table->integer('photo_id')->unsigned()->nullable();
            $table->foreign('photo_id')->references('id')
                ->on('photos')->onDelete('cascade');

            $table->integer('place_id')->unsigned()->nullable();
            $table->foreign('place_id')->references('id')
                ->on('places')->onDelete('cascade');

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
        Schema::dropIfExists('photo_place');
    }
}
