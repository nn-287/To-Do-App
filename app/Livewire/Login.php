<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth; 
use Livewire\Attributes\Title;

#[Title('Login')]
class Login extends Component
{
   
    public $email = '';
    public $password = '';


    public function submit()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) 
        {
            session()->flash('status', 'Logged in successfully!.');
            return redirect()->intended('/dashboard');
        } 
        else 
        {
            session()->flash('status', 'Please check your email or password again!');
            return redirect(route('login'));
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
