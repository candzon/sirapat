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
        Schema::create('peserta_rapats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rapat_id')->constrained('rapats');
            $table->foreignId('opd_id')->constrained('opds');
            $table->enum('status_kehadiran', ['belum_hadir', 'hadir', 'tidak_hadir'])->default('belum_hadir');
            $table->timestamp('waktu_hadir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_rapats');
    }
};
