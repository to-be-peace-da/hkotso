<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Advertisement;
use App\Models\Audience;
use App\Models\Course;
use App\Models\Day;
use App\Models\Department;
use App\Models\News;
use App\Models\Order;
use App\Models\Part;
use App\Models\Schedule;
use App\Models\Semester;
use App\Models\Substitution;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
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

        Day::Create(
            [
                'name' => 'Понедельник'
            ],
        );

        Day::Create(
            [
                'name' => 'Вторник'
            ],
        );

        Day::Create(
            [
                'name' => 'Среда'
            ],
        );

        Day::Create(
            [
                'name' => 'Четверг'
            ],
        );

        Day::Create(
            [
                'name' => 'Пятница'
            ],
        );

        Day::Create(
            [
                'name' => 'Суббота'
            ],
        );

        Day::Create(
            [
                'name' => 'Воскресенье'
            ],
        );

        Order::Create(
            [
                'name' => 'I'
            ],
        );

        Order::Create(
            [
                'name' => 'II'
            ],
        );

        Order::Create(
            [
                'name' => 'III'
            ],
        );

        Order::Create(
            [
                'name' => 'IV'
            ],
        );

        Order::Create(
            [
                'name' => 'V'
            ],
        );

        Order::Create(
            [
                'name' => 'VI'
            ],
        );

        Order::Create(
            [
                'name' => 'VII'
            ],
        );

        Course::Create(
            [
                'name' => 'Первый'
            ],
        );

        Course::Create(
            [
                'name' => 'Второй'
            ],
        );

        Course::Create(
            [
                'name' => 'Третий'
            ],
        );

        Course::Create(
            [
                'name' => 'Четвертый'
            ],
        );

        Department::create(
            [
                'name' => 'Волочаевская, 1'
            ]
        );

        Department::create(
            [
                'name' => 'Краснореченская, 58'
            ]
        );

        Department::create(
            [
                'name' => 'Советская, 24'
            ]
        );

        Part::create(
            [
                'name' => 'Числитель'
            ]
        );

        Part::create(
            [
                'name' => 'Знаменатель'
            ]
        );

        Semester::create(
            [
                'name' => 'Первое'
            ]
        );

        Semester::create(
            [
                'name' => 'Второе'
            ]
        );

        $audiences = range(1, 500);

        foreach ($audiences as $audience) {
            Audience::create([
                'number' => $audience
            ]);
        }

        News::factory(10)->create();
//        Advertisement::factory(10)->create();
//        Schedule::factory(10)->create();
//        Substitution::factory(10)->create();
    }
}
