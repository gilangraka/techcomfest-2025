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
        Schema::create('ref_mulmed', function (Blueprint $table) {
            $table->id();
            $table->uuid('team_id');
            $table->string('orisinalitas_karya');
            $table->string('hasil_karya');
            $table->timestamps();

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
