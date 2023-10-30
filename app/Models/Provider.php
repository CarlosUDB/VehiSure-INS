<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'address',
    ];

    protected $guarded = ['id'];

    public function car_parts(): HasMany
    {
        return $this->hasMany(CarPart::class);
    }
}
