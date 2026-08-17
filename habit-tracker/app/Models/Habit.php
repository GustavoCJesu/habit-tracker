<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Habit extends Model
{
    protected $fillable = [
        'user_id',
        'name'
    ];

    public function User(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function habitLog(): HasMany{
        return $this->hasMany(HabitLog::class);
    }
}
