<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{public function index(Request $request)
{
    $search = $request->input('search');

    $pacientes = Paciente::when($search, function ($query, $search) {
                        return $query->where('nombres', 'like', "%{$search}%")
                                     ->orWhere('apellidos', 'like', "%{$search}%")
                                     ->orWhere('rut', 'like', "%{$search}%");
                    })
                    ->orderBy('id', 'asc')
                    ->paginate(20)
                    ->withQueryString() // mantiene la búsqueda al paginar
                    ->appends(['search' => $search]); // para mantener el valor en la búsqueda

    return view('pacientes.index', compact('pacientes', 'search'));
}

    public function create()
    {
        // Asegurate de tener el archivo: resources/views/pacientes/create.blade.php
        return view('pacientes.create');
    }

    /**
     * Almacenar un nuevo paciente
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'rut' => 'required|string|max:20|unique:pacientes,rut',
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:pacientes,email',
            'telefono' => 'required|string|max:15',
            'fecha_nacimiento' => 'required|date',
        ]);

        Paciente::create($validated);

        return redirect()->route('pacientes.index')
                         ->with('success', 'Paciente creado exitosamente');
    }

    /**
     * Mostrar un paciente
     */
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    /**
     * Actualizar paciente
     */
    public function update(Request $request, Paciente $paciente)
    {
        $validated = $request->validate([
            'rut' => 'required|string|max:20|unique:pacientes,rut,'.$paciente->id,
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:pacientes,email,'.$paciente->id,
            'telefono' => 'required|string|max:15',
            'fecha_nacimiento' => 'required|date',
        ]);

        $paciente->update($validated);

        return redirect()->route('pacientes.index')
                         ->with('success', 'Paciente actualizado exitosamente');
    }

    /**
     * Eliminar paciente
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
                         ->with('deleted', 'Paciente eliminado exitosamente');
    }

    /**
     * Confirmar eliminación de paciente
     */
    public function confirmDelete(Paciente $paciente)
    {
        return view('pacientes.confirmDelete', compact('paciente'));
    }
    /**
     * Eliminar paciente después de confirmación
     */
    public function destroyConfirmed(Paciente $paciente)
    {
        $paciente->delete();

        return redirect()->route('pacientes.index')
                         ->with('deleted', 'Paciente eliminado exitosamente');
    }
}    