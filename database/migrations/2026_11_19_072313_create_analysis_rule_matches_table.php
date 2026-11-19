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
        Schema::create('analysis_rule_matches', function (Blueprint $table) {
            $table->foreignId('analysis_result_id')->constrained('analysis_results')->cascadeOnDelete();
            $table->foreignId('detection_rule_id')->constrained('detection_rules')->cascadeOnDelete();
            $table->text('matched_indicator')->nullable();
            $table->primary(['analysis_result_id', 'detection_rule_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis_rule_matches');
    }
};
