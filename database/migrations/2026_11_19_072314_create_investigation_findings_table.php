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
        Schema::create('investigation_findings', function (Blueprint $table) {
            $table->id();
            $table->string('finding_title');
            $table->text('finding_description');
            $table->timestamp('recorded_at')->useCurrent();
            $table->foreignId('investigation_case_id')->constrained('investigation_cases')->cascadeOnDelete();
            $table->foreignId('digital_evidence_id')->nullable()->constrained('digital_evidence')->nullOnDelete();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investigation_findings');
    }
};
