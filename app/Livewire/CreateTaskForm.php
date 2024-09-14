<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Livewire\Attributes\Title;

#[Title('Create New Task')]
class CreateTaskForm extends Component
{   
   
    public $title = '';
    public $description = '';

    public function createTask()
    {
        $this->validate([
            'title' => 'required|min:3',
            'description' => 'nullable|max:255',
        ]);

        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        session()->flash('message', 'Task created successfully!!');
        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.create-task-form');
    }
        
}
