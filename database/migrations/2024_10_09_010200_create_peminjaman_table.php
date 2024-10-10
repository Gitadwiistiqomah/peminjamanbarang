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
            $table->foreignId('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('kelas');
            $table->string('waktu_peminjaman');
            $table->string('waktu_kembali');
            $table->string('total_pinjam');
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
