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
        Schema::create('apropos_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idAproposPage')->nullable();
            $table->string('name')->unique();
            $table->boolean('hero_section')->default(true);
            $table->boolean('qui_sommes_nous_section')->default(true);
            $table->boolean('nos_valeurs_section')->default(true);
            $table->boolean('notre_histoire_section')->default(true);
            $table->boolean('notre_equipe_section')->default(true);
            $table->boolean('cta_section')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apropos_pages');
    }
};
