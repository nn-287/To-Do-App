<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = DB::table('users')->first()->id; 

        DB::table('tasks')->insert([
            ['title' => 'Buy groceries', 'description' => 'Milk, Bread, Eggs', 'status' => 'pending', 'user_id' => $userId, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Finish project', 'description' => 'Complete the Laravel task manager', 'status' => 'pending', 'user_id' => $userId, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Call mom', 'description' => 'Catch up with mom', 'status' => 'completed', 'user_id' => $userId, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
