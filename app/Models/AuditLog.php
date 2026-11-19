<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'action_type', 'action_desc', 'module', 'previous_value', 'new_value',
        'ip_address', 'action_status', 'created_at',
        'user_id', 'investigation_case_id', 'digital_evidence_id',
    ];

    protected $casts = ['created_at' => 'datetime'];
}