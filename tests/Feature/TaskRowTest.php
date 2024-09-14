<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Livewire\Livewire;

class TaskRowTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


     /** @test */
     public function it_mounts_properly_with_task_data()
     {
         $user = User::factory()->create();
         $task = Task::factory()->create(['user_id' => $user->id]);
 
         Livewire::actingAs($user)
             ->test('task-row', ['task' => $task->id])
             ->assertSet('task.id', $task->id)
             ->assertSee($task->title);
     }
}
