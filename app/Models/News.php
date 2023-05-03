<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    public static function boot(): void
    {
        parent::boot();

        static::saving(function ($model) {
            $slug = Str::slug($model->name);
            $count = static::where('slug', $slug)->count();

            if ($count > 0) {
                $suffix = 2;
                while (static::where('slug', $slug . '-' . $suffix)->count() > 0) {
                    $suffix++;
                }
                $slug = $slug . '-' . $suffix;
            }

            $model->slug = $slug;
        });
    }
}
