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
        Schema::create('pemeriksaan_laboratoriums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('antrian_id')->constrained()->cascadeOnDelete();
            $table->foreignId('jenis_pemeriksaan_id')->constrained()->cascadeOnDelete();
            $table->string('nilai')->nullable();
            $table->string('catatan')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_laboratoriums');
    }
};
