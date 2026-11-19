<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntegrityVerification extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'original_hash', 'current_hash', 'verification_result',
        'verified_at', 'digital_evidence_id', 'user_id',
    ];

    protected $casts = ['verified_at' => 'datetime'];
}