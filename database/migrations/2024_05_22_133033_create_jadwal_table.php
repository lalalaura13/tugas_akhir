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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tanggal');
            $table->string('waktu')->nullable();
            $table->string('narahubung_1')->nullable();
            $table->string('nohp_narhub_1')->nullable();
            $table->string('narahubung_2')->nullable();
            $table->string('nohp_narhub_2')->nullable();
            $table->string('narahubung_3')->nullable();
            $table->string('nohp_narhub_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
        
    }
};
