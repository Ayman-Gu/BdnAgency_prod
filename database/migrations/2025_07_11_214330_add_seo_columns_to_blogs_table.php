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
    Schema::table('blogs', function (Blueprint $table) {
        $table->string('image_alt')->nullable();
        $table->string('image_title')->nullable();
        $table->string('meta_keywords')->nullable();
        $table->string('meta_description')->nullable();
    });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['image_alt', 'image_title', 'meta_keywords', 'meta_description']);
        });
    }
};
