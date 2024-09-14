<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <form wire:submit.prevent="updateTask">

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
            <input type="text" id="title" wire:model="title" placeholder="Enter task title"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                required>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><em><?php echo e($message); ?></em><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea id="description" wire:model="description" placeholder="Enter task description"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                rows="4"></textarea>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><em><?php echo e($message); ?></em><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
                Save
            </button>
        </div>

    </form>
    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
        <div id="flash-message" class="alert alert-success bg-green-500 text-white p-4 rounded">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>

<?php /**PATH C:\xampp\htdocs\Task-app\resources\views/livewire/edit-task-form.blade.php ENDPATH**/ ?>