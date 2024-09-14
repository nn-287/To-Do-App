<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class Taskrow extends Component
{
    public $task;
    public $editingTaskId = null;

    public function mount(Task $task)
    {
        $this->task = $task;
    }

    public function render()
    {
        return view('livewire.taskrow');
    }
}
