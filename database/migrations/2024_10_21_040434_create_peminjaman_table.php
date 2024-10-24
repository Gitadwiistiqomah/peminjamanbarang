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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('kelas');
            $table->foreignId('items_id')->references('id')->on('items');
            $table->foreignId('categories_id')->references('id')->on('categories');
            $table->dateTime('waktu_peminjaman');
            $table->enum('status', ['Belum Dikembalikan', 'Sudah Dikembalikan'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
