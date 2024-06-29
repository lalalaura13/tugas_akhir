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
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kolat_id');
            $table->string('atlet');
            $table->string('path');
            $table->string('kategori');
            $table->string('juara');
            $table->timestamps();
            $table->foreign('kolat_id')->references('id_kolat')->on('kelompok_latihan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sertifikat');
    }
};
