<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Faker\Factory as Faker;

class NewTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 15; $i++) {
            
            $userId = $faker->randomElement([1, 2]);
            $status = $faker->randomElement([0, 1]);

            DB::table('tasks')->insert([
                'title' => $faker->sentence(3),  
                'description' => $faker->paragraph(), 
                'status' => $status,
                'user_id' => $userId, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
