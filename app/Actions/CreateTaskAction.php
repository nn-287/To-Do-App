<?php

namespace App\Actions;

use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CreateTaskAction
{
    public function execute(array $data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|min:3',
            'description' => 'nullable|max:255',
        ]);

        if ($validator->fails()) 
        {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        $userId = Auth::id(); 

        return Task::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'status' => 'pending', 
            'user_id' => $userId, 
        ]);
    }
}
