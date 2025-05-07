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
        Schema::create('syarat_jenis_dps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('syarat');
            $table->float('alert');
            $table->float('action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syarat_jenis_dps');
    }
};
