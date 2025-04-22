<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Animangalist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'studio',
        'type',
        'ep_count',
        'synopsis',
        'cover_image',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
