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
        Schema::create('home_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idHome')->nullable();
            $table->string('name')->unique();
            $table->boolean('hero_section')->default(true);
            $table->boolean('about_section')->default(true);
            $table->boolean('features_section')->default(true);
            $table->boolean('cta_section')->default(true);
            $table->boolean('services_section')->default(true);
            $table->boolean('portfolio_section')->default(true);
            $table->boolean('testimonials_section')->default(true);
            $table->boolean('pricing_section')->default(true);
            $table->boolean('faq_section')->default(true);
            $table->boolean('team_section')->default(true);
            $table->boolean('recentposts_section')->default(true);
            $table->boolean('contact_section')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page');
    }
};
