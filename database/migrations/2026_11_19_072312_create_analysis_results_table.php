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
        Schema::create('analysis_results', function (Blueprint $table) {
            $table->id();
            $table->string('analysis_type');                   // Rule-based | AI media
            $table->text('result');
            $table->decimal('confidence_score', 5, 2)->nullable(); // e.g. 87.00 for AI
            $table->timestamp('analysis_date')->useCurrent();
            $table->foreignId('digital_evidence_id')->constrained('digital_evidence')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis_results');
    }
};
