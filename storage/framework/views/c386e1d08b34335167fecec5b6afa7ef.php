

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Registrar nuevo paciente</h2>

    <?php if($errors->any()): ?>
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>- <?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('pacientes.store')); ?>" method="POST" class="space-y-4">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block font-semibold">rut:</label>
            <input type="text" name="rut" value="<?php echo e(old('rut')); ?>"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">nombres:</label>
            <input type="text" name="nombres" value="<?php echo e(old('nombres')); ?>"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo e(old('apellidos')); ?>"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">email:</label>
            <input type="text" name="email" value="<?php echo e(old('email')); ?>"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">telefono:</label>
            <input type="text" name="telefono" value="<?php echo e(old('telefono')); ?>"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">fecha_nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="<?php echo e(old('fecha_nacimiento')); ?>"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar paciente
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aplicacionweb\resources\views/pacientes/create.blade.php ENDPATH**/ ?>