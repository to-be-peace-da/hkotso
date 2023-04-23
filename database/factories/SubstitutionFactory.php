<?php

namespace Database\Factories;

use App\Models\Audience;
use App\Models\Day;
use App\Models\Group;
use App\Models\Order;
use App\Models\Subject;
use App\Models\Substitution;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubstitutionFactory extends Factory
{
    protected $model = Substitution::class;

    public function definition(): array
    {
        return [
            'course_id' => rand(1, 4),
            'department_id' => rand(1, 3),
            'date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'order_id' => rand(1, 7),
            'subject_id' => Subject::factory(),
            'audience_id' => Audience::factory(),
            'teacher_id' => Teacher::factory(),
            'day_id' => rand(1, 7),
            'group_id' => Group::factory(),
        ];
    }
}
