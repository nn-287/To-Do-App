<?php

namespace App\Actions;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ChangeTaskStatusAction
{
    public function execute(Task $task, $status)
    {
        if (!in_array($status, ['completed', 'pending'])) 
        {
            throw new \Exception('Invalid status');
        }

        $userId = Auth::id(); 
        if ($task->user_id !== $userId) 
        {
            // throw new \Exception('Unauthorized');
            session()->flash('message', 'Unauthorized to modify this task status.');
        }

        $task->update([
            'status' => $status,
        ]);

        return $task;
    }
}
