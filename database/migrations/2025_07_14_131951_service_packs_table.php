<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('pack_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Start, Avancé, Expert, Sur Mesure
            $table->timestamps();
        });

        Schema::create('packs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->foreignId('pack_type_id')->constrained('pack_types')->onDelete('cascade');
            $table->boolean('active')->default(false);
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });

        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pack_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->boolean('active')->default(true); // determines dashed or not
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
        Schema::dropIfExists('packs');
        Schema::dropIfExists('pack_types');
        Schema::dropIfExists('services');
    }
};
