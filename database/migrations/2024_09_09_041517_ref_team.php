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
        Schema::create('ref_team', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_team')->unique();
            $table->unsignedBigInteger('kategori_id');
            $table->string('file_berkas')->nullable();
            $table->string('file_bukti_pembayaran')->nullable();
            $table->integer('is_verified')->nullable();
            $table->string('keterangan')->default(0);
            // 0 -> Ditolak / Not Verified, 1 -> Verified
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('ref_kategori')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
