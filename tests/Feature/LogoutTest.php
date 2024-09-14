<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;


class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /** @test */
    public function it_logs_the_user_out()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

        Livewire::test('logout') 
            ->call('logout') 
            ->assertRedirect(route('login')); 

      
        $this->assertGuest();
    }
}
