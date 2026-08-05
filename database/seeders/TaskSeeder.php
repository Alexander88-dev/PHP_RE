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
            "description" => 'Разобраться с Route::get и Route::resource',
            "status" => Task::STATUS_COMPLETED,
            "deadline" => now()->addDays(5),
        ]);
        Task::query()->create([
            "title" => 'Изучить маршруты Controller',
            "description" => 'Реализовать методы index, create, store, show, edit, update, destroy',
            "status" => Task::STATUS_NEW,
            "deadline" => now()->addWeek(),
        ]);
        Task::query()->create([
            "title" => 'Изучить маршруты Eloquent',
            "description" => 'Сравнить Eloquent с использованием PDO',
            "status" => Task::STATUS_NEW,
            "deadline" => null,
        ]);
        Task::query()->create([
            "title" => 'Настроить валидацию',
            "description" => 'Использовать отдельны классы Form Request',
            "status" => Task::STATUS_NEW,
            "deadline" => now()->addDays(10),
        ]);
        Task::query()->create([
            "title" => 'Повторить маршруты MVC',
            "description" => 'Определить ответственность модели, представлния и контроллеры',
            "status" => Task::STATUS_COMPLETED,
            "deadline" => now()->subDay(),
        ]);
    }
}