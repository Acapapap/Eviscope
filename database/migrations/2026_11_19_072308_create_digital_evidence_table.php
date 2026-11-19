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
        Schema::create('digital_evidence', function (Blueprint $table) {
            $table->id();
            $table->string('evidence_name');
            $table->string('evidence_category');
            $table->text('description')->nullable();
            $table->string('file_path');
            $table->string('file_type');
            $table->unsignedBigInteger('file_size')->default(0);
            $table->char('original_hash', 64);                 // SHA-256 = 64 hex characters
            $table->timestamp('uploaded_at')->useCurrent();
            $table->foreignId('investigation_case_id')->constrained('investigation_cases')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users'); // uploaded by
            $table->timestamps();
            $table->index('original_hash');                    // fast lookup (also helps your future public hash check)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_evidence');
    }
};
