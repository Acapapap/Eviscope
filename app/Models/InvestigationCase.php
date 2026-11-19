<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvestigationCase extends Model
{
    protected $fillable = [
        'case_code', 'case_title', 'description', 'scam_type',
        'case_date', 'case_status', 'reported_by', 'user_id',
    ];

    protected $casts = ['case_date' => 'date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function evidence(): HasMany
    {
        return $this->hasMany(DigitalEvidence::class);
    }

    public function findings(): HasMany
    {
        return $this->hasMany(InvestigationFinding::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(InvestigationReport::class);
    }
}