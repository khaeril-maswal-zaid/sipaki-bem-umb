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
        Schema::create('kotak_suara_peternakans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasangan_calon_id');
            $table->unsignedBigInteger('mahasiswa_id')->unique();
            $table->timestamps();

            $table->foreign('pasangan_calon_id')->references('id')->on('pasangan_calons');
            $table->foreign('mahasiswa_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kotak_suara_peternakans');
    }
};
