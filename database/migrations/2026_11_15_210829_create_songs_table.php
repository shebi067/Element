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
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('artist_id')->nullable()->constrained('artists')->nullOnDelete();
            $table->string('artist_name');
            $table->string('album_name')->nullable();
            $table->string('genre')->default('Pop');
            $table->string('cover_url');
            $table->string('audio_url');
            $table->string('duration')->default('3:30');
            $table->unsignedBigInteger('plays_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_trending')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
