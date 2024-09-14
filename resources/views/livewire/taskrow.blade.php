<tr class="border border-gray-300">
    <td class="border border-gray-300 px-4 py-2">
        {{ $task->title }}
    </td>
    <td class="border border-gray-300 px-4 py-2">
        {{ $task->description }}
    </td>
    <td class="border border-gray-300 px-4 py-2">
        <input type="checkbox" wire:change="$parent.handleToggleStatus({{ $task->id }})" {{ $task->status === 'completed' ? 'checked' : '' }}>
    </td>


    <td class="border border-gray-300 px-4 py-2">
        <div class="flex space-x-2">

            <button wire:click="$parent.redirectToEdit({{ $task->id }})"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full shadow-lg transition duration-300 ease-in-out">
                Edit
            </button>


            <button wire:click="$parent.deleteTask({{ $task->id }})"
                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-full shadow-lg transition duration-300 ease-in-out"
                wire:confirm="Are You Sure You Want To Delete This Task ?">
                Delete
            </button>
        </div>
    </td>
</tr>