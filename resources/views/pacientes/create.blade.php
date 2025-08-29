@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6">Registrar nuevo paciente</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacientes.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">rut:</label>
            <input type="text" name="rut" value="{{ old('rut') }}"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">nombres:</label>
            <input type="text" name="nombres" value="{{ old('nombres') }}"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">apellidos:</label>
            <input type="text" name="apellidos" value="{{ old('apellidos') }}"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">email:</label>
            <input type="text" name="email" value="{{ old('email') }}"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">telefono:</label>
            <input type="text" name="telefono" value="{{ old('telefono') }}"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">fecha_nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                   class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar paciente
            </button>
        </div>
    </form>
</div>
@endsection

