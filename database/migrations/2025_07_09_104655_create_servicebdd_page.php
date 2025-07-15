<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('servicebdd_page', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idServiceBDD')->nullable();
            $table->string('name')->unique();
            $table->boolean('hero_section')->default(true);
            $table->boolean('features_section')->default(true);
            $table->boolean('benefits_section')->default(true);
            $table->boolean('use_cases_section')->default(true);
            $table->boolean('testimonials_section')->default(true);
            $table->boolean('cta_section')->default(true);
            $table->boolean('pricing_section')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicebdd_page');
    }
};
