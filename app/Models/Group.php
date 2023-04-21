<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Group extends Model
{
    use HasFactory;

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    public function course(): HasOne
    {
        return $this->hasOne(Course::class);
    }

    public function department(): HasOne
    {
        return $this->hasOne(Department::class);
    }
}
