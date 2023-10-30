<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'address',
        'insurer_id',
    ];

    protected $guarded = ['id'];

    public function insurer(): BelongsTo
    {
        return $this->belongsTo(Insurer::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function requisitions(): HasMany
    {
        return $this->hasMany(Requisition::class);
    }

    public function incidents(): HasMany
    {
        return $this->hasMany(Incidents::class);
    }
}
