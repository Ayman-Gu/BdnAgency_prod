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
        Schema::create('servicebranding_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idServiceBranding')->nullable();
            $table->string('name')->unique();
            $table->boolean('hero_section')->default(true);
            $table->boolean('features_section')->default(true);
            $table->boolean('benefits_section')->default(true);
            $table->boolean('examples_section')->default(true);
            $table->boolean('cta_section')->default(true);
            $table->boolean('pricing_section')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicebranding_page');
    }
};
