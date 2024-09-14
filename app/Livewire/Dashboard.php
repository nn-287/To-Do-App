<?php

namespace App\Livewire;

use Livewire\Component;
use livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
