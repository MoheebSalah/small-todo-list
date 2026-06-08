<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Task::count() > 0) {
            return;
        }

        Task::create([
            'title' => "learn basic of laravel",
            'description' => "lorem ipsum and anything here to write",
            'status' => "pending"
        ]);
        Task::create([
            'title' => "learn the liverwire",
            'description' => "lorem ipsum and anything here to write",
            'status' => "pending"
        ]);
        Task::create([
            'title' => "Develop the Todolist",
            'description' => "lorem ipsum and anything here to write",
            'status' => "in_progress"
        ]);
        Task::create([
            'title' => "come to the company",
            'description' => "lorem ipsum and anything here to write",
            'status' => "done"
        ]);
    }
}
