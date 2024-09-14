<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;

class LoginTest extends TestCase
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


    public function it_allows_user_login()
    {
        $user = User::factory()->create(['password' => bcrypt('password123')]);

        Livewire::test('login')
            ->set('email', $user->email)
            ->set('password', 'password123')
            ->call('submit')
            ->assertRedirect('/dashboard');

       
        $this->assertAuthenticatedAs($user);
    }
}
