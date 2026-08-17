<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password'])]
class User extends Authenticatable {
    /** @use HasFactory<UserFactory> */
        use HasFactory;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
        protected function casts(): array {
            return [
            'password' => 'hashed',
        ];
        }

        public function habits(): HasMany{

            return $this->hasMany(Habit::class);
        }

        public function habitLog(): HasMany{
            return $this->hasMany(HabitLog::class);
        }
    }
