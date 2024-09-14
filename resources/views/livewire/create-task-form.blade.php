<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <form wire:submit.prevent="createTask">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
            <input type="text" id="title" wire:model="title" placeholder="Enter task title"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                required>
            @error('title')<em>{{$message}}</em>@enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea id="description" wire:model="description" placeholder="Enter task description"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                rows="4"></textarea>

            @error('description')<em>{{$message}}</em>@enderror
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                Create Task
            </button>
        </div>
    </form>
    @if (session()->has('message'))
        <div id="flash-message" class="alert alert-success bg-green-500 text-white p-4 rounded">
            {{ session('message') }}
        </div>
    @endif
</div>


