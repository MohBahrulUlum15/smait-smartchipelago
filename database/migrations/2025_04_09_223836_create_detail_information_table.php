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
        Schema::create('detail_information', function (Blueprint $table) {
            $table->id();
            $table->string('email_info')->nullable();
            $table->string('phone_info')->nullable();
            $table->string('address_info')->nullable();
            $table->string('website_name_info')->nullable();
            $table->string('website_link_info')->nullable();
            $table->string('facebook_link_info')->nullable();
            $table->string('instagram_link_info')->nullable();
            $table->string('youtube_link_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_information');
    }
};
