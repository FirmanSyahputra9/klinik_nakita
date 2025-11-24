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
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('antrian_id')->constrained()->cascadeOnDelete();
            $table->foreignId('obat_id')->constrained()->cascadeOnDelete();
            $table->string('dosis');
            $table->string('frekuensi')->nullable();
            $table->string('waktu_konsumsi')->nullable();
            $table->string('kuantitas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
