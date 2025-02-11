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
        Schema::create('sambutans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepala_sekolah');
            $table->string('foto_kepala_sekolah')->nullable();
            $table->text('sambutan_kepala_sekolah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sambutans');
    }
};
