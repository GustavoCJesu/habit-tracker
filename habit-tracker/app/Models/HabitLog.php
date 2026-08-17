<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HabitLog extends Model
{
    protected $fillable = [
        'user_id',
        'habit_id',
        'completed_at',
    ];

    public function User(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function habit(): BelongsTo{
        return $this->belongsTo(Habit::class);
    }
}
