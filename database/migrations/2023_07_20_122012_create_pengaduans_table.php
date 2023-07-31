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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pengaduan')->autoIncrement();
            $table->timestamp('tgl_pengaduan')->default(now());
            $table->string('nik')->nullable();
            $table->text('isi_laporan')->nullable();
            $table->string('foto')->nullable();
            $table->enum('status', ['pending', 'proses', 'selesai'])->nullable();
            // $table->enum('status', ['0', 'proses', 'selesai'])->default('0');
        });

        Schema::table('pengaduans', function (Blueprint $table) {
            $table->foreign('nik')->references('nik')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
