

<?php $__env->startSection('title', 'Editar Paciente'); ?>

<?php $__env->startSection('content'); ?>
  <h1 class="text-2xl font-semibold mb-6">Editar Paciente</h1>

  <form action="<?php echo e(route('pacientes.update', $paciente->id)); ?>" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div>
      <label for="rut" class="block text-sm font-medium text-gray-700">Rut</label>
      <input type="text" name="rut" id="rut" value="<?php echo e(old('rut', $paciente->rut)); ?>" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div>
      <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
      <input type="text" name="nombres" id="nombres" value="<?php echo e(old('nombres', $paciente->nombres)); ?>" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div>
      <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
      <input type="text" name="apellidos" id="apellidos" value="<?php echo e(old('apellidos', $paciente->apellidos)); ?>" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div>
      <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
      <input type="text" name="email" id="email" value="<?php echo e(old('email', $paciente->email)); ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div>
      <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono </label>
      <input type="text" name="telefono" id="telefono" value="<?php echo e(old('telefono', $paciente->telefono)); ?>" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div>
      <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
      <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo e(old('fecha_nacimiento', optional($paciente->fecha_nacimiento)->format('Y-m-d'))); ?>" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div class="flex justify-end">
      <a href="<?php echo e(route('pacientes.index')); ?>" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 mr-2">Cancelar</a>
      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar Cambios</button>
    </div>
  </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aplicacionweb\resources\views/pacientes/edit.blade.php ENDPATH**/ ?>