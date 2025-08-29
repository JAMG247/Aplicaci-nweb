<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Modo mantenimiento
if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Autoload de Composer (sin subir directorios)
require __DIR__.'/vendor/autoload.php';

// Bootstrap de Laravel
$app = require_once __DIR__.'/bootstrap/app.php';

$app->handleRequest(
    Request::capture()
)->send();
// Terminar la aplicación
$app->terminate();