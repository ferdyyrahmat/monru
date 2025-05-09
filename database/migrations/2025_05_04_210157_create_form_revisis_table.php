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
        Schema::create('form_revisis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->float('suhu');
            $table->float('suhu_min');
            $table->float('suhu_max');
            $table->float('rh');
            $table->float('dp');
            $table->string('alasan')->nullable();
            $table->uuid('shift_pemeriksaan');
            $table->integer('tgl_pemeriksaan');
            $table->integer('bulan_pemeriksaan');
            $table->integer('tahun_pemeriksaan');
            $table->time('jam_pemeriksaan');
            $table->uuid('id_ruangan');
            $table->uuid('id_sub_department');
            $table->uuid('id_pelaksana');
            $table->uuid('id_verifikator')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_outstanding')->default(false);
            $table->enum('status', ['need_review', 'rejected', 'accepted'])->default('need_review');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_revisis');
    }
};
