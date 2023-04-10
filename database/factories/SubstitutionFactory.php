<?php

namespace Database\Factories;

use App\Models\Audience;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubstitutionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'order_id' => random_int(1, 7),
            'subject_id' => Subject::factory(),
            'audience_id' => Audience::factory(),
            'teacher_id' => Teacher::factory(),
            'day_id' => random_int(1, 7),
            'group_id' => Group::factory(),
        ];
    }
}
