<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengguna');
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->string('email_pelanggan');
            $table->string('no_telepon');
            $table->string('kode')->unique();
            $table->string('status');
            $table->dateTime('tanggal_pemesanan');
            $table->dateTime('batas_pembayaran');
            $table->string('status_pembayaran');
            $table->string('token_pembayaran')->nullable();
            $table->string('url_pembayaran')->nullable();
            $table->string('provinsi');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->integer('hari');
            $table->decimal('subtotal', 16, 2)->default(0);
            $table->decimal('total', 16, 2)->default(0);
            $table->unsignedBigInteger('diterima_oleh')->nullable();
            $table->dateTime('diterima_pada')->nullable();
            $table->unsignedBigInteger('dibatalkan_oleh')->nullable();
            $table->dateTime('dibatalkan_pada')->nullable();
            $table->text('pesan_dibatalkan')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_pengguna')->references('id')->on('users');
            $table->foreign('diterima_oleh')->references('id')->on('users');
            $table->foreign('dibatalkan_oleh')->references('id')->on('users');
            $table->index('kode');
            $table->index(['kode', 'tanggal_pemesanan']);
            $table->index('token_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
