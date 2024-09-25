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
        Schema::create('ref_peserta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nik')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nomor_hp', 20);
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('asal_sekolah')->nullable();
            $table->string('foto_profil')->nullable();
            $table->string('nama_pembina')->nullable();
            $table->uuid('team_id')->nullable();
            $table->integer('is_ketua')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('gender_id')->references('id')->on('ref_gender')->cascadeOnDelete();
            $table->foreign('kategori_id')->references('id')->on('ref_kategori')->cascadeOnDelete();
            $table->foreign('team_id')->references('id')->on('ref_team')->cascadeOnDelete();
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
