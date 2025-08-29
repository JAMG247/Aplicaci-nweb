<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
    $table->id();
    $table->string('rut')->unique();
    $table->string('nombres');
    $table->string('apellidos');
    $table->string('email')->unique();
    $table->string('telefono')->nullable();
    $table->date('fecha_nacimiento');
    $table->timestamps();
});

        // Add any additional fields or indexes as needed
        Schema::table('pacientes', function (Blueprint $table) {
            $table->index(['nombres', 'apellidos']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
