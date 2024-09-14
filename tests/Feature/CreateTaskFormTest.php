<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;


class CreateTaskFormTest extends TestCase
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
    public function it_creates_a_task()
    {
        $user = User::factory()->create();


        Livewire::actingAs($user)
            ->test('create-task-form')
            ->set('title', 'New Task')
            ->set('description', 'Task Description')
            ->call('createTask') 
            ->assertHasNoErrors();

       
        $this->assertDatabaseHas('tasks', [
            'title' => 'New Task',
            'description' => 'Task Description',
            'user_id' => $user->id,
        ]);
    }
}
