<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetectionRule extends Model
{
    protected $fillable = [
        'rule_name', 'description', 'indicator_type', 'severity',
        'indicator', 'rule_status', 'user_id',
    ];

    public function scopeEnabled($query)
    {
        return $query->where('rule_status', 'enabled');
    }
}