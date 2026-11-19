<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestigationReport extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'report_name', 'report_path', 'generated_at',
        'investigation_case_id', 'user_id',
    ];

    protected $casts = ['generated_at' => 'datetime'];
}