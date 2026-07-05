@extends('layouts.app')

@section('title', $estudiante->nombre . ' ' . $estudiante->apellido)

@section('content')
<div class="max-w-4xl mx-auto px-4">

    {{-- Encabezado --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $estudiante->nombre }} {{ $estudiante->apellido }}
            </h1>
            <p class="text-gray-500 text-sm mt-1">{{ $estudiante->programa_academico }}</p>
        </div>
        <a href="{{ route('estudiantes.index') }}"
            class="bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200 transition">
            Volver
        </a>
    </div>

    {{-- Datos del estudiante --}}
    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <h2 class="text-lg font-bold text-green-800 mb-4 border-b border-green-100 pb-2">
            Datos Personales
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-500">Nombre completo</p>
                <p class="font-medium">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Documento</p>
                <p class="font-medium">{{ $estudiante->documento }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Código Estudiantil</p>
                <p class="font-medium text-green-700">{{ $estudiante->codigo_estudiantil }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="font-medium">{{ $estudiante->email }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Programa Académico</p>
                <p class="font-medium">{{ $estudiante->programa_academico }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Teléfono</p>
                <p class="font-medium">{{ $estudiante->telefono ?? 'No registrado' }}</p>
            </div>
        </div>
    </div>

    {{-- Solicitudes del estudiante --}}
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex justify-between items-center mb-4 border-b border-green-100 pb-2">
            <h2 class="text-lg font-bold text-green-800">Solicitudes</h2>
            <a href="{{ route('solicitudes.create') }}"
                class="bg-green-700 text-white py-1 px-3 rounded-lg hover:bg-green-800 text-sm">
                Nueva Solicitud
            </a>
        </div>

        @forelse($estudiante->solicitudes as $solicitud)
        <div class="border border-gray-100 rounded-lg p-4 mb-3 hover:bg-green-50 transition">
            <div class="flex justify-between items-center">
                <div>
                    <p class="font-medium">{{ $solicitud->tipo_solicitud }}</p>
                    <p class="text-sm text-gray-500 mt-1">
                        {{ $solicitud->created_at->format('d/m/Y') }}
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        {{ $solicitud->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                        {{ $solicitud->estado == 'en_revision' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $solicitud->estado == 'aprobada' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $solicitud->estado == 'rechazada' ? 'bg-red-100 text-red-800' : '' }}">
                        {{ ucfirst(str_replace('_', ' ', $solicitud->estado)) }}
                    </span>
                    <a href="{{ route('solicitudes.show', $solicitud) }}"
                        class="text-green-700 hover:text-green-900 text-sm font-medium">
                        Ver detalle
                    </a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-gray-400 text-center py-6">
            Este estudiante no tiene solicitudes registradas.
        </p>
        @endforelse
    </div>
</div>
@endsection