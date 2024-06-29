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
        Schema::create('medali', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kolat_id');
            $table->string('emas');
            $table->string('perak');
            $table->string('perunggu');
            $table->timestamps();
            $table->foreign('kolat_id')->references('id_kolat')->on('kelompok_latihan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medali');
    }
};
