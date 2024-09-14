<div class="w-full overflow-x-auto">
     <!-- Filters -->
     <div class="flex mb-4">
        <button wire:click="setFilter('all')" class="px-4 py-2 border {{ $filter === 'all' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">All</button>
        <button wire:click="setFilter('pending')" class="ml-2 px-4 py-2 border {{ $filter === 'pending' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">Pending</button>
        <button wire:click="setFilter('completed')" class="ml-2 px-4 py-2 border {{ $filter === 'completed' ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">Completed</button>
    </div>

    <table class="w-full border-collapse border border-gray-200">
        <thead>
            <tr>
                <th class="border border-gray-300 px-4 py-2">Title</th>
                <th class="border border-gray-300 px-4 py-2">Description</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($tasks && $tasks->count() > 0)
                @foreach($tasks as $task)
                    <livewire:task-row :task="$task" :key="$task->id" />
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center">No tasks available</td>
                </tr>
            @endif
        </tbody>
    </table>
    @if($editingTaskId)
        <livewire:edit-task-form :taskId="$editingTaskId" />
    @endif


     
     @if (session()->has('notif'))
            <div id="flash-message" class="fixed bottom-4 right-4 p-3 text-green-700 bg-green-100 border border-green-300 rounded-md">
                {{ session('notif') }}
            </div>
        @endif
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var flashMessage = document.getElementById('flash-message');
                if (flashMessage) {
                    setTimeout(function () {
                        flashMessage.style.opacity = '0';
                        setTimeout(function () {
                            flashMessage.style.display = 'none';
                        }, 900); 
                    }, 9000);
                }
            });
        </script>
        <!---->
        @livewireScripts
</div>
