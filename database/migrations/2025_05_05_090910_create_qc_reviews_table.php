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
        Schema::create('qc_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_segment_id')->constrained()->onDelete('cascade'); // Segment being reviewed
            $table->foreignId('reviewer_id')->constrained('users')->onDelete('cascade'); // QC user who reviewed
            $table->enum('status', ['approved', 'rejected']);
            $table->text('comments')->nullable(); // Optional comments or error description
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qc_reviews');
    }
};
