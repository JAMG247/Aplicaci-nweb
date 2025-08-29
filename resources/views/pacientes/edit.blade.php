@extends('layouts.app')

@section('title', 'Editar Paciente')

@section('content')
  <h1 class="text-2xl font-semibold mb-6">Editar Paciente</h1>

  <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
    @csrf
    @method('PUT')

    <div>
      <label for="rut" class="block text-sm font-medium text-gray-700">Rut</label>
      <input type="text" name="rut" id="rut" value="{{ old('rut', $paciente->rut) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div>
      <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
      <input type="text" name="nombres" id="nombres" value="{{ old('nombres', $paciente->nombres) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div>
      <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
      <input type="text" name="apellidos" id="apellidos" value="{{ old('apellidos', $paciente->apellidos) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div>
      <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
      <input type="text" name="email" id="email" value="{{ old('email', $paciente->email) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div>
      <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono </label>
      <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $paciente->telefono) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div>
      <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
      <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', optional($paciente->fecha_nacimiento)->format('Y-m-d')) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" />
    </div>

    <div class="flex justify-end">
      <a href="{{ route('pacientes.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 mr-2">Cancelar</a>
      <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar Cambios</button>
    </div>
  </form>
@endsection
