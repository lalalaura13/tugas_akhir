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
        Schema::create('kelompok_latihan', function (Blueprint $table) {
            $table->id('id_kolat');
            $table->unsignedBigInteger('user_id');
            $table->string('nama_kontingen')->unique();
            $table->string('nama_pelatih_1')->nullable();
            $table->string('nama_pelatih_2')->nullable();
            $table->string('form_B')->nullable();
            $table->string('nama_form_B')->nullable();
            $table->string('image')->nullable();
            $table->string('hashname')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok_latihan');
    }
};
