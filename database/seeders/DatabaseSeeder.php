<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Advertisement;
use App\Models\News;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'is_admin' => true,
            'password' => bcrypt('secret-password')
        ]);

        News::factory(10)->create();
        Advertisement::factory(10)->create();
        Schedule::factory(10)->create();
    }
}
