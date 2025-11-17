<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id('id_detail_transaksi');
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_katalog');
            $table->integer('qty')->comment('Jumlah produk yang dibeli'); 
            $table->decimal('harga_satuan', 10, 2)->comment('Harga per item saat transaksi');
            $table->decimal('subtotal', 10, 2)->comment('qty * harga_satuan');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_transaksi')
                  ->references('id_transaksi')
                  ->on('transaksi')
                  ->onDelete('cascade');

            $table->foreign('id_katalog')
                  ->references('id_katalog')
                  ->on('katalog')
                  ->onDelete('cascade');

            // Index untuk optimasi
            $table->index(['id_transaksi', 'id_katalog']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->dropForeign(['id_transaksi']);
            $table->dropForeign(['id_katalog']);
            $table->dropIndex(['id_transaksi', 'id_katalog']);
        });

        Schema::dropIfExists('detail_transaksi');
    }
};