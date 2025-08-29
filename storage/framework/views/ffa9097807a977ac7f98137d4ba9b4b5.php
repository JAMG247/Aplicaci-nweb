<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $__env->yieldContent('title', 'Gestión de Pacientes'); ?></title>
  <!-- Tailwind CDN -->
  <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="min-h-screen bg-gray-50 font-sans">
  <nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <a href="/" class="text-xl font-bold text-gray-800">AppCitas</a>
      <div class="space-x-4">
        <a href="<?php echo e(route('pacientes.index')); ?>" class="text-gray-700 hover:text-gray-900">Pacientes</a>
        <a href="<?php echo e(route('pacientes.create')); ?>" class="text-gray-700 hover:text-gray-900">Nuevo Paciente</a>
      </div>
    </div>
  </nav>

  <main class="container mx-auto px-4 py-8">
    <?php echo $__env->yieldContent('content'); ?>
  </main>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\aplicacionweb\resources\views/layouts/app.blade.php ENDPATH**/ ?>