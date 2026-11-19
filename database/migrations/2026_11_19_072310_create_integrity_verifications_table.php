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
        Schema::create('integrity_verifications', function (Blueprint $table) {
            $table->id();
            $table->char('original_hash', 64);
            $table->char('current_hash', 64);
            $table->string('verification_result');             // Verified | Mismatch
            $table->timestamp('verified_at')->useCurrent();
            $table->foreignId('digital_evidence_id')->constrained('digital_evidence')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('integrity_verifications');
    }
};
