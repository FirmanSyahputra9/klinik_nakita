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
        Schema::create('data_pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('antrian_id')->constrained()->cascadeOnDelete();
            $table->text('diagnosa')->nullable();
            $table->text('rencana')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pemeriksaans');
    }
};
