<?php

namespace Database\Factories;

use App\Models\Audience;
use App\Models\Day;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ScheduleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'subject_id' => Subject::factory(),
            'audience_id' => Audience::factory(),
            'teacher_id' => Teacher::factory(),
            'day_id' => Day::factory(),
            'group_id' => Group::factory(),
        ];
    }
}
