@extends('layouts.app')

@section('title', 'Actualizar Estado')

@section('content')
<div class="max-w-3xl mx-auto px-4">

    {{-- Encabezado --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Actualizar Estado</h1>
        <p class="text-gray-500 text-sm mt-1">Solicitud #{{ $solicitud->id }}</p>
    </div>

    {{-- Información de la solicitud --}}
    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <h2 class="text-lg font-bold text-green-800 mb-4 border-b border-green-100 pb-2">
            Información de la Solicitud
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-500">Estudiante</p>
                <p class="font-medium">
                    {{ $solicitud->estudiante->nombre }}
                    {{ $solicitud->estudiante->apellido }}
                </p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Tipo de Solicitud</p>
                <p class="font-medium">{{ $solicitud->tipo_solicitud }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Estado actual</p>
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                    {{ $solicitud->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                    {{ $solicitud->estado == 'en_revision' ? 'bg-blue-100 text-blue-800' : '' }}
                    {{ $solicitud->estado == 'aprobada' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $solicitud->estado == 'rechazada' ? 'bg-red-100 text-red-800' : '' }}">
                    {{ ucfirst(str_replace('_', ' ', $solicitud->estado)) }}
                </span>
            </div>
            <div>
                <p class="text-sm text-gray-500">Fecha de registro</p>
                <p class="font-medium">{{ $solicitud->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
        <div class="mt-4">
            <p class="text-sm text-gray-500">Descripción</p>
            <p class="font-medium bg-gray-50 p-3 rounded-lg border mt-1">
                {{ $solicitud->descripcion }}
            </p>
        </div>
    </div>

    {{-- Formulario de actualización --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-bold text-green-800 mb-4 border-b border-green-100 pb-2">
            Actualizar Estado
        </h2>
        <form action="{{ route('solicitudes.update', $solicitud) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nuevo Estado</label>
                <select name="estado"
                    class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                    <option value="pendiente" {{ $solicitud->estado == 'pendiente' ? 'selected' : '' }}>
                        Pendiente
                    </option>
                    <option value="en_revision" {{ $solicitud->estado == 'en_revision' ? 'selected' : '' }}>
                        En Revisión
                    </option>
                    <option value="aprobada" {{ $solicitud->estado == 'aprobada' ? 'selected' : '' }}>
                        Aprobada
                    </option>
                    <option value="rechazada" {{ $solicitud->estado == 'rechazada' ? 'selected' : '' }}>
                        Rechazada
                    </option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Observaciones (opcional)
                </label>
                <textarea name="observaciones" rows="4"
                    class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Agrega observaciones sobre la decisión tomada...">{{ old('observaciones', $solicitud->observaciones) }}</textarea>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                    class="bg-green-700 text-white py-2 px-6 rounded-lg hover:bg-green-800 transition font-medium">
                    Guardar Cambios
                </button>
                <a href="{{ route('solicitudes.show', $solicitud) }}"
                    class="bg-gray-100 text-gray-700 py-2 px-6 rounded-lg hover:bg-gray-200 transition font-medium">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection