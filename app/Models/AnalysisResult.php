<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AnalysisResult extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'analysis_type', 'result', 'confidence_score',
        'analysis_date', 'digital_evidence_id', 'user_id',
    ];

    protected $casts = ['analysis_date' => 'datetime'];

    public function evidence(): BelongsTo
    {
        return $this->belongsTo(DigitalEvidence::class, 'digital_evidence_id');
    }

    public function rules(): BelongsToMany
    {
        return $this->belongsToMany(DetectionRule::class, 'analysis_rule_matches')
            ->withPivot('matched_indicator');
    }
}