<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Solicitudes Académicas')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-green-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex space-x-6 items-center">
                    <a href="{{ route('solicitudes.index') }}"
                        class="text-white font-bold text-xl tracking-wide">
                        Sistema Académico
                    </a>
                    <a href="{{ route('solicitudes.index') }}"
                        class="text-green-200 hover:text-white transition font-medium">
                        Solicitudes
                    </a>
                    <a href="{{ route('estudiantes.index') }}"
                        class="text-green-200 hover:text-white transition font-medium">
                        Estudiantes
                    </a>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('solicitudes.create') }}"
                        class="bg-white text-green-800 px-4 py-2 rounded-lg hover:bg-green-100 transition font-medium text-sm">
                        Nueva Solicitud
                    </a>
                    <a href="{{ route('estudiantes.create') }}"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition font-medium text-sm border border-green-500">
                        Nuevo Estudiante
                    </a>
                </div>
            </div>
        </div>
    </nav>

    {{-- Mensajes flash --}}
    @if(session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 text-green-800 px-6 py-4 m-4 rounded-lg shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-50 border-l-4 border-red-500 text-red-800 px-6 py-4 m-4 rounded-lg shadow-sm">
        {{ session('error') }}
    </div>
    @endif

    @if($errors->any())
    <div class="bg-red-50 border-l-4 border-red-500 text-red-800 px-6 py-4 m-4 rounded-lg shadow-sm">
        <p class="font-bold mb-2">Por favor corrige los siguientes errores:</p>
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Contenido principal --}}
    <main class="py-8 flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-green-800 text-green-200 text-center py-4 mt-8">
        <p class="text-sm">Sistema de Solicitudes Académicas © 2026</p>
    </footer>

</body>
</html>