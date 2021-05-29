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
            $table->string('lokasi');
            $table->string('slug');
            $table->unsignedBigInteger('wisata_id');
            $table->unsignedBigInteger('provinsi_id');
            $table->text('deskripsi')->nullable();
            $table->string('jenis');
            $table->text('jalur_pendakian')->nullable();
            $table->text('rute_termudah')->nullable();
            $table->text('rute_normal')->nullable();
            $table->timestamps();

            $table->foreign('wisata_id')->references('id')->on('tours')->onDelete('cascade');
            $table->foreign('provinsi_id')->references('id')->on('provinces')->onDelete('cascade');
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
