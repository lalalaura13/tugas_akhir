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
        Schema::create('detail_bagan', function (Blueprint $table) {
            $table->id();
            $table->string('sudut_merah');
            $table->string('sudut_biru');
            $table->string('Juri_1_merah')->nullable();
            $table->string('Juri_2_merah')->nullable();
            $table->string('Juri_3_merah')->nullable();
            $table->string('Juri_4_merah')->nullable();
            $table->string('skor_1_merah')->nullable();
            $table->string('skor_2_merah')->nullable();
            $table->string('skor_3_merah')->nullable();
            $table->string('skor_4_merah')->nullable();
            $table->string('Juri_1_biru')->nullable();
            $table->string('Juri_2_biru')->nullable();
            $table->string('Juri_3_biru')->nullable();
            $table->string('Juri_4_biru')->nullable();
            $table->string('skor_1_biru')->nullable();
            $table->string('skor_2_biru')->nullable();
            $table->string('skor_3_biru')->nullable();
            $table->string('skor_4_biru')->nullable();
            $table->string('total_skor_merah')->nullable();
            $table->string('total_skor_biru')->nullable();
            $table->unsignedBigInteger('bagan_id');
            $table->foreign('bagan_id')->references('id')->on('bagan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_bagan');
    }
};