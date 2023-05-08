<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ScheduleFactory extends Factory
{
    protected $model = Schedule::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'order_id' => rand(1, 7),
            'subject_id' => Subject::factory(),
            'audience_id' => rand(1, 500),
            'teacher_id' => Teacher::factory(),
            'day_id' => rand(1, 7),
            'group_id' => Group::factory(),
            'course_id' => rand(1, 4),
            'department_id' => rand(1, 3),
            'part_id' => rand(1, 2),
            'semester_id' => rand(1, 2),
        ];
    }
}
