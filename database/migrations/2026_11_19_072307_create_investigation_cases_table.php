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
        Schema::create('investigation_cases', function (Blueprint $table) {
            $table->id();
            $table->string('case_code')->unique()->nullable(); // CASE-2026-014, generated later
            $table->string('case_title');
            $table->text('description');
            $table->string('scam_type');                       // Phishing | AI Impersonation
            $table->date('case_date');                         // incident date
            $table->string('case_status')->default('Open');    // Open | In Review | Closed
            $table->string('reported_by')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investigation_cases');
    }
};
