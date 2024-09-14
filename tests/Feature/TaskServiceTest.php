<?php

namespace Tests\Feature;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Tests\TestCase;
use App\Services\TaskService;
use App\Actions\CreateTaskAction;
use App\Actions\UpdateTaskAction;
use App\Actions\DeleteTaskAction;
use App\Actions\ChangeTaskStatusAction;
use App\Models\Task;
use Mockery;

class TaskServiceTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    protected $createTaskActionMock;
    protected $updateTaskActionMock;
    protected $deleteTaskActionMock;
    protected $changeTaskStatusActionMock;
    protected $taskService;

    
   
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function setUp(): void
    {
        parent::setUp();

        $this->createTaskActionMock = Mockery::instanceMock(CreateTaskAction::class);
        $this->updateTaskActionMock = Mockery::instanceMock(UpdateTaskAction::class);
        $this->deleteTaskActionMock = Mockery::instanceMock(DeleteTaskAction::class);
        $this->changeTaskStatusActionMock = Mockery::instanceMock(ChangeTaskStatusAction::class);

        $this->taskService = new TaskService(
            $this->createTaskActionMock,
            $this->updateTaskActionMock,
            $this->deleteTaskActionMock,
            $this->changeTaskStatusActionMock
        );
    }

    public function tearDown(): void
    {

        Mockery::close();
        parent::tearDown();
    }

    public function testCreateTask()
    {

        /** @var \Mockery\MockInterface|CreateTaskAction $this->createTaskActionMock */
        $data = ['title' => 'Test Task', 'description' => 'Task description'];

       
        $this->createTaskActionMock
            ->shouldReceive('execute')
            ->once()
            ->with($data)
            ->andReturn(true); // Simulate success

      
        $result = $this->taskService->createTask($data);
        $this->assertTrue($result);
    }



    public function testUpdateTask()
    {
       
         /** @var \Mockery\MockInterface|UpdateTaskAction $this->updateTaskActionMock */
        $task = Task::factory()->make();
        $data = ['title' => 'Updated Task'];

        $this->updateTaskActionMock
            ->shouldReceive('execute')
            ->once()
            ->with($task, $data)
            ->andReturn(true);

        $this->taskService->updateTask($task, $data);
    }




    public function testDeleteTask()
    {
        /** @var \Mockery\MockInterface|DeleteTaskAction $this->deleteTaskActionMock */
        $task = Task::factory()->make();
        $this->deleteTaskActionMock
            ->shouldReceive('execute')
            ->once()
            ->with($task)
            ->andReturn(true); 
        $this->taskService->deleteTask($task);
    }



    public function testChangeTaskStatus()
    {
         /** @var \Mockery\MockInterface|ChangeTaskStatusAction $this->changeTaskStatusActionMock */
        $task = Task::factory()->make();
        $status = 'completed';

        $this->changeTaskStatusActionMock
            ->shouldReceive('execute')
            ->once()
            ->with($task, $status)
            ->andReturn(true); // Simulate success

        $result = $this->taskService->changeTaskStatus($task, $status);
        $this->assertTrue($result);
    }
    
}
