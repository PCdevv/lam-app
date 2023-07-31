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
        Schema::create('tanggapans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tanggapan')->autoIncrement();
            $table->unsignedBigInteger('id_pengaduan')->nullable();
            $table->timestamp('tgl_tanggapan')->default(now());
            $table->text('tanggapan')->nullable();
            $table->unsignedBigInteger('id_petugas')->nullable();
        });

        Schema::table('tanggapans', function (Blueprint $table) {
            $table->foreign('id_pengaduan')->references('id_pengaduan')->on('pengaduans')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapans');
    }
};
