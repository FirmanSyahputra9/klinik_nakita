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
        Schema::create('nilai_data_umum_pasiens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_umum_pasien_id')->constrained()->cascadeOnDelete();
            $table->string('nilai_atas');
            $table->string('nilai_bawah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_data_umum_pasiens');
    }
};
