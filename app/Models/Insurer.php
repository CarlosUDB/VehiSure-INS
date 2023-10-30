<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'telephone',
    ];

    protected $guarded = ['id'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function workspaces(): HasMany
    {
        return $this->hasMany(Workspace::class);
    }
}
