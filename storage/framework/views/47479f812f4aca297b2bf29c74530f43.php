<div class="w-full overflow-x-auto">
    
     <!-- Task Filters -->
     <div class="flex mb-4">
        <button wire:click="setFilter('all')" class="px-4 py-2 border <?php echo e($filter === 'all' ? 'bg-blue-500 text-white' : 'bg-gray-200'); ?>">All</button>
        <button wire:click="setFilter('pending')" class="ml-2 px-4 py-2 border <?php echo e($filter === 'pending' ? 'bg-blue-500 text-white' : 'bg-gray-200'); ?>">Pending</button>
        <button wire:click="setFilter('completed')" class="ml-2 px-4 py-2 border <?php echo e($filter === 'completed' ? 'bg-blue-500 text-white' : 'bg-gray-200'); ?>">Completed</button>
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
            <!--[if BLOCK]><![endif]--><?php if($tasks && $tasks->count() > 0): ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('task-row', ['task' => $task]);

$__html = app('livewire')->mount($__name, $__params, $task->id, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No tasks available</td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
    <!--[if BLOCK]><![endif]--><?php if($editingTaskId): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('edit-task-form', ['taskId' => $editingTaskId]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3930611528-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


     
     <!--[if BLOCK]><![endif]--><?php if(session()->has('notif')): ?>
            <div id="flash-message" class="fixed bottom-4 right-4 p-3 text-green-700 bg-green-100 border border-green-300 rounded-md">
                <?php echo e(session('notif')); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
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
        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</div>
<?php /**PATH C:\xampp\htdocs\Task-app\resources\views/livewire/task-list.blade.php ENDPATH**/ ?>