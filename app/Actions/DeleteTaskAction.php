<?php

namespace App\Actions;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DeleteTaskAction
{
    public function execute(Task $task)
    {
        $userId = Auth::id();
        if ($task->user_id !== $userId) 
        {
            //throw new \Exception('Unauthorized');
            session()->flash('message', 'Unauthorized to delete this task.');
        }
        $task->delete();
    }
}
