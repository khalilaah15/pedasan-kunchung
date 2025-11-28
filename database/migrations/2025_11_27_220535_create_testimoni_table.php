<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Pastikan tabel belum ada sebelum membuat
        if (!Schema::hasTable('testimoni')) {
            Schema::create('testimoni', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->text('pesan');
                $table->integer('rating')->default(5);
                $table->boolean('disetujui')->default(false);
                $table->timestamps();

                // Foreign key constraint
                $table->foreign('user_id')
                      ->references('id_user')
                      ->on('users')
                      ->onDelete('cascade');

                // Index untuk performance
                $table->index('user_id');
                $table->index('disetujui');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('testimoni');
    }
};