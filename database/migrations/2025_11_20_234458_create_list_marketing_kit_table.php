<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('list_marketing_kit', function (Blueprint $table) {
            $table->id('id_marketing_kit');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('file_gambar')->nullable(); // bisa URL atau path
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('list_marketing_kit');
    }
};