<div class="min-h-screen bg-gray-100">
    <div class="bg-blue-600 text-white p-4">
        <h1 class="text-3xl font-bold">Welcome, <?php echo e($user->name); ?>!</h1>
        <div class="flex w-full justify-between px-4 bg-blue-600 text-white">
            <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
            <button onclick="window.location.href='<?php echo e(url('/createtask')); ?>';"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-full shadow-lg transition duration-300 ease-in-out">
                Create new task
            </button>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('logout', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1568675394-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?> 
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
    <br>
    
    <div class="p-6">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('task-list', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1568675394-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\Task-app\resources\views/livewire/dashboard.blade.php ENDPATH**/ ?>