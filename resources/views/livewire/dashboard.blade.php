<div class="min-h-screen bg-gray-100">
    <div class="bg-blue-600 text-white p-4">
        <h1 class="text-3xl font-bold">Welcome, {{ $user->name }}!</h1>
        <div class="flex w-full justify-between px-4 bg-blue-600 text-white">
            @auth
            <button onclick="window.location.href='{{ url('/createtask') }}';"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-full shadow-lg transition duration-300 ease-in-out">
                Create new task
            </button>
            <livewire:logout/> 
            @endauth
        </div>
    </div>
    <br>
    
    <div class="p-6">
        <livewire:task-list/>
    </div>
</div>

