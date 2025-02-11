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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->enum('type', ['event', 'kunjungan', 'lomba', 'pembelajaran', 'pelatihan', 'seminar', 'workshop', 'lainnya']);
            $table->string('author')->nullable();
            $table->json('tags')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('supporting_images')->nullable();
            $table->boolean('on_delete')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
