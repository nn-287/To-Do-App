<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Livewire\Livewire;

class TaskListTest extends TestCase
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
      public function it_loads_tasks_correctly()
      {
            $user = User::factory()->create();
            $tasks = Task::factory()->count(3)->create(['user_id' => $user->id]);

            Livewire::actingAs($user)
                ->test('task-list')
                ->assertSee($tasks->first()->title)
                ->assertSee($tasks->get(1)->title)
                ->assertSee($tasks->last()->title);
      }


  
      /** @test */
      public function it_deletes_a_task()
      {
            $user = User::factory()->create();
            $task = Task::factory()->create(['user_id' => $user->id]);

            $component = Livewire::actingAs($user)
                ->test('task-list')
                ->call('deleteTask', $task->id); 

            $component->assertSee('Task deleted successfully');
            $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
      }
  


      /** @test */
    public function it_toggles_task_status()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id, 'status' => 'pending']);


        $component = Livewire::actingAs($user)
            ->test('task-list') 
            ->call('handleToggleStatus', $task->id); 

        
        $component->assertSee('Task status updated');

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'status' => 'completed',
        ]);
    }
}
