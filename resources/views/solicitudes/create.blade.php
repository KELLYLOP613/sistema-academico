@extends('layouts.app')

@section('title', 'Nueva Solicitud')

@section('content')
<div class="max-w-3xl mx-auto px-4">

    {{-- Encabezado --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Nueva Solicitud Académica</h1>
        <p class="text-gray-500 text-sm mt-1">Completa el formulario para registrar tu solicitud</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('solicitudes.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estudiante</label>
                <select name="estudiante_id"
                    class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                    <option value="">Selecciona un estudiante</option>
                    @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}"
                        {{ old('estudiante_id') == $estudiante->id ? 'selected' : '' }}>
                        {{ $estudiante->nombre }} {{ $estudiante->apellido }}
                        — {{ $estudiante->codigo_estudiantil }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Solicitud</label>
                <select name="tipo_solicitud"
                    class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                    <option value="">Selecciona el tipo</option>
                    <option value="Cancelación de materia">Cancelación de materia</option>
                    <option value="Adición de materia">Adición de materia</option>
                    <option value="Validación de materia">Validación de materia</option>
                    <option value="Homologación">Homologación</option>
                    <option value="Paz y salvo">Paz y salvo</option>
                    <option value="Certificado de notas">Certificado de notas</option>
                    <option value="Recurso de apelación">Recurso de apelación</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción del caso</label>
                <textarea name="descripcion" rows="5"
                    class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Describe detalladamente tu solicitud..."
                    required>{{ old('descripcion') }}</textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                    class="bg-green-700 text-white py-2 px-6 rounded-lg hover:bg-green-800 transition font-medium">
                    Enviar Solicitud
                </button>
                <a href="{{ route('solicitudes.index') }}"
                    class="bg-gray-100 text-gray-700 py-2 px-6 rounded-lg hover:bg-gray-200 transition font-medium">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection