<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id('id_detail_transaksi');
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_katalog');
            // ...

            $table->foreign('id_transaksi')
                ->references('id_transaksi')
                ->on('transaksi')
                ->onDelete('cascade');

            $table->foreign('id_katalog')
                ->references('id_katalog')
                ->on('katalog')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->dropForeign(['transaksi_id']);
            $table->dropForeign(['katalog_id']);
        });
        Schema::dropIfExists('detail_transaksi');
    }
};