<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;


class TaskList extends Component
{
    public $filter = 'all';
    public $title = '';
    public $description = '';
    public $taskIdBeingDeleted;
    // public $tasks;

    public $tasks = [];
    public $editingTaskId = null;

    protected $listeners = [
        'taskUpdated' => '$refresh',
        'toggleStatus' => 'handleToggleStatus',
    ];

    public function mount()
    {
        $this->loadTasks();
    }

    public function loadTasks()
    {
        $query = Task::where('user_id', Auth::id());

        if ($this->filter === 'completed') 
        {
            $query->where('status', 'completed');
        } 
        elseif ($this->filter === 'pending') 
        {
            $query->where('status', 'pending');
        }

        $this->tasks = $query->get();
    }

    public function setFilter($status)
    {
        $this->filter = $status;
        $this->loadTasks(); 
    }

    
    public function redirectToEdit($taskId)
    {
        return redirect()->route('task.edit', ['taskId' => $taskId]);
    }


    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);
        $userId = Auth::id();

        
        if ($task && $task->user_id === $userId) 
        {
            $task->delete();
            $this->dispatch('taskUpdated');
            session()->flash('notif', 'Task deleted successfully');
        } 
        else 
        {
            session()->flash('message', 'Unauthorized to delete this task.');
        }
    }


    public function handleToggleStatus($taskId)
    {
        $task = Task::find($taskId);
        $userId = Auth::id();

        if ($task && $task->user_id === $userId) 
        {
            $newStatus = $task->status === 'completed' ? 'pending' : 'completed';
            $this->changeTaskStatus($task, $newStatus);
            session()->flash('notif', 'Task status updated');
        } 
        else 
        {
            session()->flash('message', 'Unauthorized to change status of this task.');
        }
    }

    public function changeTaskStatus(Task $task, $status)
    {
        $task->update(['status' => $status]);
        $this->dispatch('taskUpdated');
    }

    public function render()
    {
        return view('livewire.task-list',['tasks' => $this->tasks]);
    }
}

