<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class NewsFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->realText('200'),
            'text' => $this->faker->realText('3000'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
