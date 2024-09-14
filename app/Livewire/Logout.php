<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class Logout extends Component
{
    public function logout()
    {
        Auth::logout();
        session()->flash('status', 'Successfully logged out. See you soon!');
        return redirect(route('login'));
    }

    public function render()
    {
        return view('livewire.logout');
    }
}
