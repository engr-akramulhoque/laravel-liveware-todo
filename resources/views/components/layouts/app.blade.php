<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 font-sans">
        <!-- Header -->
        <header class="bg-blue-600 text-white py-4 shadow-md">
            <div class="container mx-auto text-center">
                <h1 class="text-2xl font-bold">Laravel Livewire Todo App</h1>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto mt-6 p-4">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4 text-center mt-6">
            <p>&copy; 2024 ToDo App. All rights reserved.</p>
        </footer>
        <!-- Script -->
    </body>
</html>
