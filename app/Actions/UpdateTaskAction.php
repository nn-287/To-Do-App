<?php

namespace App\Actions;

use App\Models\Task;
use Illuminate\Support\Facades\Validator;

class UpdateTaskAction
{
    public function execute(Task $task, $data)
    {
         $validator = Validator::make($data, [
            'title' => 'required|min:3',
            'description' => 'nullable|max:255',
        ]);

        if ($validator->fails()) 
        {
            // throw new \Illuminate\Validation\ValidationException($validator);
            session()->flash('message', 'check again');
        }

        $task->update([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return $task;
    }
}
