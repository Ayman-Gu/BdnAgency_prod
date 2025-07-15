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
        Schema::create('serviceemailing_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idServiceEMAILING')->nullable();
            $table->string('name')->unique();
            $table->boolean('hero_section')->default(true);
            $table->boolean('features_section')->default(true);
            $table->boolean('emailMarketing_section')->default(true);
            $table->boolean('automation_section')->default(true);
            $table->boolean('cta_section')->default(true);
            $table->boolean('services_section')->default(true);
            $table->boolean('pricing_section')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serviceemailing_page');
    }
};
