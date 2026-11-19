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
        Schema::create('evidence_metadata', function (Blueprint $table) {
            $table->id();
            $table->string('metadata_type');
            $table->string('metadata_name');
            $table->text('metadata_value')->nullable();
            $table->timestamp('extracted_at')->useCurrent();
            $table->foreignId('digital_evidence_id')->constrained('digital_evidence')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidence_metadata');
    }
};
