

<?php $__env->startSection('title', 'Lista de Pacientes'); ?>

<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    <div id="flash-message" class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('deleted')): ?>
    <div id="flash-message" class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <?php echo e(session('deleted')); ?>

    </div>
<?php endif; ?>
<div class="mb-4 flex items-center space-x-2">
    <!-- Botón lupa -->
    <button id="toggleSearch" 
            aria-label="Buscar"
            title="Buscar"
            class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-300">
        <svg xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 24 24"
             fill="none"
             stroke="currentColor"
             stroke-width="2"
             class="h-6 w-6">
            <circle cx="11" cy="11" r="7"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
    </button>

    <!-- Campo de búsqueda (inicialmente oculto) -->
    <form id="searchForm" method="GET" action="<?php echo e(route('pacientes.index')); ?>" 
          class="items-center space-x-2 " >
        <input type="text" 
               name="search" 
               placeholder="Buscar paciente" 
               value="<?php echo e(request('search')); ?>"
               class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <button type="submit" 
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            Buscar
        </button>
    </form>
</div>
<!-- Script -->
 
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.getElementById("toggleSearch");
        const searchForm = document.getElementById("searchForm");
        let visible = false;

        // Inicialmente ocultar el formulario de búsqueda
        searchForm.classList.add("scale-0", "opacity-0");

        // Mostrar el formulario si hay una búsqueda activa
        toggleBtn.addEventListener("click", function() {
            visible = !visible; 
        if (visible) {
        searchForm.classList.remove("scale-0", "opacity-0",);
        searchForm.classList.add("scale-100", "opacity-100");
      } else {
        searchForm.classList.remove("scale-100", "opacity-100");
        searchForm.classList.add("scale-0", "opacity-0",);
      }
        });
    });
</script>

<?php if(!empty($search)): ?>
    <a href="<?php echo e(route('pacientes.index')); ?>" 
       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
               Limpiar
            </a>
        <?php endif; ?>
    </form>
</div>

<h1 class="text-2xl font-semibold mb-4">Lista de Pacientes</h1>
<table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
    <thead class="bg-gray-100">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">id</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">rut</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">nombres</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">apellidos</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">email</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">teléfono</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">fecha de nacimiento</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Edad</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Creado</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">acciones</th>        
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
      <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <tr>
          <td class="px-6 py-4 whitespace-nowrap"><?php echo e($paciente->id); ?></td>
          <td class="px-6 py-4 whitespace-nowrap"><?php echo e($paciente->rut); ?></td>
          <td class="px-6 py-4 whitespace-nowrap"><?php echo e($paciente->nombres); ?></td>
          <td class="px-6 py-4 whitespace-nowrap"><?php echo e($paciente->apellidos); ?></td>
          <td class="px-6 py-4 whitespace-nowrap"><?php echo e($paciente->email); ?></td>
          <td class="px-6 py-4 whitespace-nowrap"><?php echo e($paciente->telefono); ?></td>
          <td class="px-6 py-4 whitespace-nowrap"><?php echo e(\Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y')); ?></td>
          <td class="px-6 py-4 whitespace-nowrap"><?php echo e($paciente->fecha_nacimiento->age); ?> años</td>
          <td class="px-6 py-4 whitespace-nowrap"><?php echo e($paciente->created_at->format('d/m/Y H:i')); ?></td>
          <td class="px-6 py-4 whitespace-nowrap">
            <a href="<?php echo e(route('pacientes.show', $paciente->id)); ?>" class="text-blue-600 hover:text-blue-900">Ver</a>
            <a href="<?php echo e(route('pacientes.edit', $paciente->id)); ?>" class="text-yellow-600 hover:text-yellow-900 ml-2">Editar</a>
            <form action="<?php echo e(route('pacientes.destroy', $paciente->id)); ?>" method="POST" class="inline ml-2">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este paciente?')" class="text-red-600 hover:text-red-900">Eliminar</button>
            </form>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <script>
    setTimeout(() => {
        const flash = document.getElementById('flash-message');
        if (flash) flash.remove();
    }, 5000);
</script>
<?php $__env->stopSection(); ?>
<div class="mt-4">
    <?php echo e($pacientes->links()); ?>

</div>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\aplicacionweb\resources\views/pacientes/index.blade.php ENDPATH**/ ?>