<?php

namespace App\Livewire;

use Livewire\Component;use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('Edit Task')]
class EditTaskForm extends Component
{
    public $taskId;
    public $title = '';
    public $description = '';

    public function mount($taskId)
    {
        $this->taskId = $taskId;
        $task = Task::find($taskId);
        

        if ($task && $task->user_id === Auth::id()) 
        {
            $this->title = $task->title;
            $this->description = $task->description;
        } 
        else 
        {
            abort(403, 'Unauthorized action.');
        }
    }


    public function updateTask()
    {
        
        $this->validate([
            'title' => 'required|min:3',
            'description' => 'nullable|max:255',
        ]);

        $task = Task::find($this->taskId);

        if ($task && $task->user_id === Auth::id()) 
        {
            $task->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);

            session()->flash('message', 'Task updated successfully.');
            $this->dispatch('taskUpdated'); 
            return redirect('/dashboard');
        } 
        else 
        {
            abort(403, 'Unauthorized action.');
        }
    }

    public function render()
    {
        return view('livewire.edit-task-form');
    }
    
}
