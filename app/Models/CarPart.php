<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'model',
        'price_per_unit',
        'provider_id',
    ];

    protected $guarded = ['id'];

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }

    public function requisition(): BelongsTo
    {
        return $this->belongsTo(Requisition::class);
    }

}
