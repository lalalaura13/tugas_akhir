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
        Schema::create('peserta', function (Blueprint $table) {
            $table->id('id_peserta');
            $table->unsignedBigInteger('kolat_id');
            $table->string('nama_atlet');
            $table->string('tempat_tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('sekolah');
            $table->string('kategori_tanding');
            $table->string('kategori_usia');
            $table->string('kelas_tanding')->nullable();
            $table->string('tingkat_nafas')->nullable();
            $table->string('form_A');
            $table->string('nama_form_A');
            $table->string('form_C');
            $table->string('nama_form_C');
            $table->string('form_D');
            $table->string('nama_form_D');
            $table->string('status');
            $table->timestamps();
            $table->foreign('kolat_id')->references('id_kolat')->on('kelompok_latihan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta');
    }
};
