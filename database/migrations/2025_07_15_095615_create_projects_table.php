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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProjects')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->string('image_alt')->nullable();
            $table->string('image_title')->nullable();
            $table->enum('status', ['pending', 'published'])->default('pending');
            $table->foreignId('project_category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
