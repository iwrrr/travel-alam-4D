<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lokasi');
            $table->string('slug');
            $table->unsignedBigInteger('id_provinsi');
            $table->string('kabupaten')->nullable();
            $table->string('map')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('jalur_pendakian')->nullable();
            $table->text('rute_termudah')->nullable();
            $table->text('rute_normal')->nullable();
            $table->timestamps();

            $table->foreign('id_provinsi')->references('id')->on('provinces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
