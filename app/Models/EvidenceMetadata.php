<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EvidenceMetadata extends Model
{
    protected $table = 'evidence_metadata';
    public $timestamps = false;

    protected $fillable = [
        'metadata_type', 'metadata_name', 'metadata_value',
        'extracted_at', 'digital_evidence_id',
    ];
}