<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_lokasi');
            $table->text('path');
            $table->timestamps();

            $table->foreign('id_lokasi')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_images');
    }
}
