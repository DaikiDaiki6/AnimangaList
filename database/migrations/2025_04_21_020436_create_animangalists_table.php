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
        Schema::create('animangalists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('studio');
            $table->enum('type', ['Anime', 'Manga'])->default('Anime');
            $table->string('ep_count');
            $table->text('synopsis');
            $table->string('cover_image')->default('Test-Pics\cover_image.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animangalists');
    }
};
