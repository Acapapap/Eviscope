<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DigitalEvidence extends Model
{
    protected $table = 'digital_evidence';

    protected $fillable = [
        'evidence_name', 'evidence_category', 'description', 'file_path',
        'file_type', 'file_size', 'original_hash', 'uploaded_at',
        'investigation_case_id', 'user_id',
    ];

    protected $casts = ['uploaded_at' => 'datetime'];

    public function case(): BelongsTo
    {
        return $this->belongsTo(InvestigationCase::class, 'investigation_case_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function metadata(): HasMany
    {
        return $this->hasMany(EvidenceMetadata::class);
    }

    public function verifications(): HasMany
    {
        return $this->hasMany(IntegrityVerification::class);
    }

    public function analysisResults(): HasMany
    {
        return $this->hasMany(AnalysisResult::class);
    }
}