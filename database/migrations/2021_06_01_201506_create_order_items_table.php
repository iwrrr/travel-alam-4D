<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pesanan');
            $table->unsignedBigInteger('id_peralatan');
            $table->string('nama_peralatan');
            $table->decimal('harga_peralatan', 16, 2)->default(0);
            $table->integer('jumlah');
            $table->decimal('subtotal', 16, 2)->default(0);
            $table->timestamps();

            $table->foreign('id_pesanan')->references('id')->on('orders');
            $table->foreign('id_peralatan')->references('id')->on('tools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
