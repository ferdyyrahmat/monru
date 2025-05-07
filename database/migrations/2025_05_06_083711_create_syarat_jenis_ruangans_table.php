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
        Schema::create('syarat_jenis_ruangans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('syarat_suhu');
            $table->float('batas_bawah_suhu_alert')->nullable();
            $table->float('batas_bawah_suhu_action')->nullable();
            $table->float('batas_atas_suhu_alert')->nullable();
            $table->float('batas_atas_suhu_action')->nullable();
            $table->string('syarat_rh');
            $table->float('batas_bawah_rh_alert')->nullable();
            $table->float('batas_bawah_rh_action')->nullable();
            $table->float('batas_atas_rh_alert')->nullable();
            $table->float('batas_atas_rh_action')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syarat_jenis_ruangans');
    }
};
