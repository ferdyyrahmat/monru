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
        Schema::create('ruangan_alats', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('area_name');
            $table->integer('room_no');
            $table->string('no_alat')->nullable();
            $table->string('manual_ems')->nullable();
            $table->uuid('id_sub_department')->nullable();
            $table->uuid('id_jenis_ruangan')->nullable();
            $table->uuid('id_dp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan_alats');
    }
};
