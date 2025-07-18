<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::create('blogs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('idBlogs')->nullable();
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('description');
        $table->string('image');
        $table->string('status')->default('pending');

        $table->unsignedBigInteger('blog_category_id');
        $table->foreign('blog_category_id')->references('id')->on('blog_categories')->onDelete('cascade');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
