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
        Schema::create('berandas', function (Blueprint $table) {
            $table->id();
            $table->string('slider_img_1');
            $table->string('slider_img_2');
            $table->string('slider_img_3');
            $table->text('deskripsi_slider_1');
            $table->text('deskripsi_slider_2');
            $table->text('deskripsi_slider_3');
            $table->string('link_slider_1')->nullable();
            $table->string('link_slider_2')->nullable();
            $table->string('link_slider_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berandas');
    }
};
