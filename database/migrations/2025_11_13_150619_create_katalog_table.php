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
        Schema::create('katalog', function (Blueprint $table) {
            $table->id('id_katalog'); // Primary key dengan nama custom
            $table->string('nama_katalog', 255);
            $table->text('deskripsi_katalog')->nullable();
            $table->decimal('harga_katalog', 15, 2); // 15 digit, 2 decimal
            $table->integer('stok_katalog')->default(0);
            $table->string('file_katalog')->nullable(); // untuk menyimpan path/nama file
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('katalog');
    }
};
