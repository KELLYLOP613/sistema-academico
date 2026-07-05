@extends('layouts.app')

@section('title', 'Estudiantes')

@section('content')
<div class="max-w-7xl mx-auto px-4">

    {{-- Encabezado --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Estudiantes Registrados</h1>
            <p class="text-gray-500 text-sm mt-1">Lista de estudiantes del sistema</p>
        </div>
        <a href="{{ route('estudiantes.create') }}"
            class="bg-green-700 text-white py-2 px-5 rounded-lg hover:bg-green-800 transition font-medium">
            Nuevo Estudiante
        </a>
    </div>

    {{-- Tabla --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-green-800 text-white">
                    <th class="text-left p-4">Código</th>
                    <th class="text-left p-4">Nombre</th>
                    <th class="text-left p-4">Documento</th>
                    <th class="text-left p-4">Email</th>
                    <th class="text-left p-4">Programa</th>
                    <th class="text-left p-4">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($estudiantes as $estudiante)
                <tr class="border-t hover:bg-green-50 transition">
                    <td class="p-4 font-medium text-green-800">{{ $estudiante->codigo_estudiantil }}</td>
                    <td class="p-4 font-medium">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</td>
                    <td class="p-4 text-gray-600">{{ $estudiante->documento }}</td>
                    <td class="p-4 text-gray-600">{{ $estudiante->email }}</td>
                    <td class="p-4 text-gray-600">{{ $estudiante->programa_academico }}</td>
                    <td class="p-4">
                        <a href="{{ route('estudiantes.show', $estudiante) }}"
                            class="bg-blue-700 text-white py-1 px-3 rounded-lg hover:bg-blue-800 transition text-xs font-medium">
                            Ver detalle
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-8 text-center text-gray-400">
                        <p class="text-lg">No hay estudiantes registrados</p>
                        <a href="{{ route('estudiantes.create') }}"
                            class="text-green-700 hover:underline text-sm mt-2 inline-block">
                            Registrar el primer estudiante
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $estudiantes->links() }}
    </div>
</div>
@endsection