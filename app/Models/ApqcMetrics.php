<?php

namespace App\Models;
use app\Models\ApqcProcess;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApqcMetrics extends Model
{
    protected $fillable = [
        'apqc_process_id',
        'metric_id',
        'metric_category',
        'metric_name',
        'formula',
        'units'
    ];

    public function process(): BelongsTo
    {
        return $this->belongsTo(ApqcProcess::class, 'apqc_process_id');
    }
}