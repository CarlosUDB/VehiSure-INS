<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'description',
        'police_report_number',
        'address',
        'status',
        'car_plate_number',
        'workshop_id',
        'diagnosis',
    ];

    protected $guarded = ['id'];

    public function workspace(): BelongsTo
    {
        return $this->belongsTo(Workspace::class);
    }

    public function requisitions(): HasMany
    {
        return $this->hasMany(Requisition::class);
    }

}
