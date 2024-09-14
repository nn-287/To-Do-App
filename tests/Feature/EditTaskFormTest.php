<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use Livewire\Livewire;


class EditTaskFormTest extends TestCase
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
    public function it_mounts_the_task_data()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test('edit-task-form', ['taskId' => $task->id]) 
            ->assertSet('title', $task->title) 
            ->assertSet('description', $task->description);
    }

    /** @test */
    public function it_updates_the_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test('edit-task-form', ['taskId' => $task->id])
            ->set('title', 'Updated Title')
            ->set('description', 'Updated Description')
            ->call('updateTask')
            ->assertHasNoErrors();


        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => 'Updated Title',
            'description' => 'Updated Description',
        ]);
    }
}
