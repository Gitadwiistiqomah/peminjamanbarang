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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('members_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreignId('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('no_hp');
            $table->string('alamat');
            $table->dateTime('tanggal_peminjaman');
            $table->string('lama_peminjaman');
            $table->string('total');
            $table->enum('status', ['WAIT', 'PROSES', 'SELESAI'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
