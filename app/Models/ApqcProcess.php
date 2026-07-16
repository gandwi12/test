<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApqcProcess extends Model
{
    protected $fillable = [
        'pcf_id',
        'hierarchy_id',
        'name',
        'has_metric',
        'element_description',
        'parent_id',
        'level',
    ];

    protected $casts = [
        'has_metric' => 'boolean',
        'level'      => 'integer',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ApqcProcess::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(ApqcProcess::class, 'parent_id');
    }

    public function metrics(): HasMany
    {
        return $this->hasMany(ApqcMetrics::class);
    }
}