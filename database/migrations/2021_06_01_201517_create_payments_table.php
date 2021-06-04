<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pesanan');
            $table->string('nomor')->unique();
            $table->decimal('jumlah_pembayaran', 16, 2)->default(0);
            $table->string('metode');
            $table->string('status');
            $table->string('token')->nullable();
            $table->json('payloads')->nullable();
            $table->string('jenis_pembayaran')->nullable();
            $table->string('nomor_va')->nullable();
            $table->string('nama_vendor')->nullable();
            $table->string('kode_tagihan')->nullable();
            $table->string('bill_key')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_pesanan')->references('id')->on('orders');
            $table->index('nomor');
            $table->index('metode');
            $table->index('token');
            $table->index('jenis_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
