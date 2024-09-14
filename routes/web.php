<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Login;
use App\Livewire\Dashboard;
use App\Livewire\CreateTaskForm;
use App\Livewire\EditTaskForm;
use App\Livewire\TaskList;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', Login::class)->name('login');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class);
    Route::get('/tasks', TaskList::class); 
    Route::get('/createtask', CreateTaskForm::class);
    Route::get('/tasks/edit/{taskId}', EditTaskForm::class)->name('task.edit');
});
