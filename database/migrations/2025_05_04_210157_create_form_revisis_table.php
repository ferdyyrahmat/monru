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
            $table->string('ruangan/alat');
            $table->float('suhu');
            $table->float('suhu_min');
            $table->float('suhu_max');
            $table->float('rh');
            $table->float('dp');
            $table->uuid('id_pelaksana');
            $table->uuid('id_verifikator');
            $table->string('alasan');
            $table->uuid('id_verifikator_revisi')->nullable();
            $table->enum('status', ['need_review', 'rejected', 'accepted'])->default('need_review');
            // $table->boolean('is_verified')->default(false);
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
