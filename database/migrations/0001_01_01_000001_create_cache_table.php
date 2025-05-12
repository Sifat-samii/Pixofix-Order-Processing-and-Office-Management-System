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
        // Table for storing cached values
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // Unique cache key
            $table->mediumText('value');      // Cached data
            $table->integer('expiration');    // Unix timestamp
        });

        // Table for cache locks (used in atomic locking)
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Unique lock key
            $table->string('owner');          // Lock owner identifier
            $table->integer('expiration');    // Unix timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
    }
};
