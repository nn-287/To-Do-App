<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TaskService;

use App\Actions\CreateTaskAction;
use App\Actions\UpdateTaskAction;
use App\Actions\DeleteTaskAction;
use App\Actions\ChangeTaskStatusAction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->singleton(TaskService::class, function ($app) {
        //     return new TaskService(
        //         $app->make(CreateTaskAction::class),
        //         $app->make(UpdateTaskAction::class),
        //         $app->make(DeleteTaskAction::class),
        //         $app->make(ChangeTaskStatusAction::class)
        //     );
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
