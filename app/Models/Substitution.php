<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Substitution extends Model
{
    use HasFactory;

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function audience(): BelongsTo
    {
        return $this->belongsTo(Audience::class);
    }

    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public static function boot(): void
    {
        parent::boot();

        static::saving(function ($model) {
            $dayOfWeek = Carbon::create($model->date)->dayOfWeek;

            switch ($dayOfWeek) {
                case CarbonInterface::MONDAY:
                    $model->day_id = 1;
                    break;
                case CarbonInterface::TUESDAY:
                    $model->day_id = 2;
                    break;
                case CarbonInterface::WEDNESDAY:
                    $model->day_id = 3;
                    break;
                case CarbonInterface::THURSDAY:
                    $model->day_id = 4;
                    break;
                case CarbonInterface::FRIDAY:
                    $model->day_id = 5;
                    break;
                case CarbonInterface::SATURDAY:
                    $model->day_id = 6;
                    break;
                case CarbonInterface::SUNDAY:
                    $model->day_id = 7;
                    break;
                default:
                    break;
            }
        });
    }
}
