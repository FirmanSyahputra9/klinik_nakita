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
        Schema::create('dokter_jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokter_id')->constrained();
            $table->date('tanggal')->nullable();
            $table->string('keterangan')->nullable();
            $table->time('aktif_mulai')->default('09:00:00')->nullable();
            $table->time('aktif_selesai')->default('17:00:00')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter_jadwals');
    }
};
