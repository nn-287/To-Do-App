<div class="flex justify-end mt-6">
    <button wire:click="logout"
        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out">
        Logout
    </button>
    <!--[if BLOCK]><![endif]--><?php if(session()->has('status')): ?>
        <div id="flash-status" class="fixed bottom-4 right-4 p-3 text-green-700 bg-green-100 border border-green-300 rounded-md">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var flashMessage = document.getElementById('flash-status');
            if (flashMessage) {
                setTimeout(function () {
                    flashMessage.style.opacity = '0';
                    setTimeout(function () {
                        flashMessage.style.display = 'none';
                    }, 300);
                }, 3000);
            }
        });
    </script>
</div>
<?php /**PATH C:\xampp\htdocs\Task-app\resources\views/livewire/logout.blade.php ENDPATH**/ ?>