<?php

namespace App\Services;

use App\Actions\CreateTaskAction;
use App\Actions\UpdateTaskAction;
use App\Actions\DeleteTaskAction;
use App\Actions\ChangeTaskStatusAction;
use App\Models\Task;

class TaskService
{
    protected $createTaskAction;
    protected $updateTaskAction;
    protected $deleteTaskAction;
    protected $changeTaskStatusAction;

    public function __construct(
        CreateTaskAction $createTaskAction,
        UpdateTaskAction $updateTaskAction,
        DeleteTaskAction $deleteTaskAction,
        ChangeTaskStatusAction $changeTaskStatusAction
    ) {
        $this->createTaskAction = $createTaskAction;
        $this->updateTaskAction = $updateTaskAction;
        $this->deleteTaskAction = $deleteTaskAction;
        $this->changeTaskStatusAction = $changeTaskStatusAction;
    }

    public function createTask($data)
    {
        return $this->createTaskAction->execute($data);
    }

    public function updateTask(Task $task, $data)
    {
        $this->updateTaskAction->execute($task, $data);
    }

    public function deleteTask(Task $task)
    {
        $this->deleteTaskAction->execute($task);
    }

    public function changeTaskStatus(Task $task, $status)
    {
        return $this->changeTaskStatusAction->execute($task, $status);
    }
}
