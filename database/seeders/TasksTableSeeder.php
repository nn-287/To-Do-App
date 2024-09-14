<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = [1, 2]; 

        foreach (range(1, 20) as $index) 
        {
            Task::create([
                'id' => $index,
                'title' => "Task $index",
                'description' => "Description for task $index",
                'status' => $index % 2 == 0 ? 'completed' : 'pending',
                'user_id' => $userIds[array_rand($userIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
