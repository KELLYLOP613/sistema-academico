@extends('layouts.app')

@section('title', 'Solicitudes Académicas')

@section('content')
<div class="max-w-7xl mx-auto px-4">

    {{-- Encabezado --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Solicitudes Académicas</h1>
            <p class="text-gray-500 text-sm mt-1">Gestión de solicitudes de estudiantes</p>
        </div>
        <a href="{{ route('solicitudes.create') }}"
            class="bg-green-700 text-white py-2 px-5 rounded-lg hover:bg-green-800 transition font-medium">
            Nueva Solicitud
        </a>
    </div>

    {{-- Tabla --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-green-800 text-white">
                    <th class="text-left p-4">#</th>
                    <th class="text-left p-4">Estudiante</th>
                    <th class="text-left p-4">Tipo de Solicitud</th>
                    <th class="text-left p-4">Estado</th>
                    <th class="text-left p-4">Fecha</th>
                    <th class="text-left p-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($solicitudes as $solicitud)
                <tr class="border-t hover:bg-green-50 transition">
                    <td class="p-4 text-gray-500">{{ $solicitud->id }}</td>
                    <td class="p-4 font-medium">
                        {{ $solicitud->estudiante->nombre }}
                        {{ $solicitud->estudiante->apellido }}
                    </td>
                    <td class="p-4">{{ $solicitud->tipo_solicitud }}</td>
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            {{ $solicitud->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $solicitud->estado == 'en_revision' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $solicitud->estado == 'aprobada' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $solicitud->estado == 'rechazada' ? 'bg-red-100 text-red-800' : '' }}">
                            {{ ucfirst(str_replace('_', ' ', $solicitud->estado)) }}
                        </span>
                    </td>
                    <td class="p-4 text-gray-500">{{ $solicitud->created_at->format('d/m/Y') }}</td>
                    <td class="p-4 flex gap-3">
                        <a href="{{ route('solicitudes.show', $solicitud) }}"
                            class="bg-green-700 text-white py-1 px-3 rounded-lg hover:bg-green-800 transition text-xs font-medium">
                            Ver
                        </a>
                        <a href="{{ route('solicitudes.edit', $solicitud) }}"
                            class="bg-blue-600 text-white py-1 px-3 rounded-lg hover:bg-blue-700 transition text-xs font-medium">
                            Actualizar
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-400">
                        <p class="text-lg">No hay solicitudes registradas</p>
                        <a href="{{ route('solicitudes.create') }}"
                            class="text-green-700 hover:underline text-sm mt-2 inline-block">
                            Crear la primera solicitud
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $solicitudes->links() }}
    </div>
</div>
@endsection