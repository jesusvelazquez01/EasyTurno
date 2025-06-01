<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Remix Icon CDN -->
<link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased min-h-screen flex flex-col bg-gray-100 dark:bg-gray-900">

    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer fijo al fondo -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; {{ date('Y') }} Sistema de Turnos Version 1.0 - Sala de Informática. Todos los derechos reservados.</p>
            <p>💻👓 Desarrollado por Alumnos de Tercer año de Software</p>
            <p>🎓 Instituto de Educación Superior "Nuevo Horizonte"</p>	
        </div>
    </footer>
</body>
</html>

