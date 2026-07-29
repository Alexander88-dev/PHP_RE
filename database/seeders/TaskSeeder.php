<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::query()->create([
            "title" => 'Изучить маршруты Laravel',
            "description" => 'Разобраться с Route::resource',
            "status" => Task::STATUS_COMPLETED,
            "deadline" => now()->addDays(2),
        ]);
        Task::query()->create([
            "title" => 'Изучить Resource Controller',
            "description" => 'Реализовать метод',
            "status" => Task::STATUS_NEW,
            "deadline" => now()->addDays(5),
        ]);
        Task::query()->create([
            "title" => 'Изучить By',
            "description" => 'Реализоваться',
            "status" => Task::STATUS_NEW,
            "deadline" => null,
        ]);
        //!!!!!!!!!!!
    }
}