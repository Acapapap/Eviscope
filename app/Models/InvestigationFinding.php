<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestigationFinding extends Model
{
    protected $fillable = [
        'finding_title', 'finding_description', 'recorded_at',
        'investigation_case_id', 'digital_evidence_id', 'user_id',
    ];

    protected $casts = ['recorded_at' => 'datetime'];
}