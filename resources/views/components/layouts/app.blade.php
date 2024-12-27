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
                <h1 class="text-2xl font-bold">ToDo App</h1>
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
        <script>
            document.getElementById('addTaskButton').addEventListener('click', () => {
                const taskTitle = document.getElementById('taskTitle');
                const taskDescription = document.getElementById('taskDescription');
                const taskDate = document.getElementById('taskDate');
                const taskFrom = document.getElementById('taskFrom');
                const taskTo = document.getElementById('taskTo');
                const taskList = document.getElementById('taskList');

                if (taskTitle.value.trim() !== '' && taskDate.value && taskFrom.value && taskTo.value) {
                    const card = document.createElement('div');
                    card.className = 'bg-gray-50 p-4 rounded-lg shadow flex flex-col justify-between';

                    const taskDetails = document.createElement('div');
                    taskDetails.innerHTML = `
                        <h3 class="font-bold text-lg text-gray-800">${taskTitle.value}</h3>
                        <p class="text-sm text-gray-600">${taskDescription.value}</p>
                        <p class="text-sm text-gray-600">Date: ${taskDate.value}</p>
                        <p class="text-sm text-gray-600">From: ${taskFrom.value} - To: ${taskTo.value}</p>
                    `;
                    card.appendChild(taskDetails);

                    const deleteButton = document.createElement('button');
                    deleteButton.className = 'mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600';
                    deleteButton.textContent = 'Delete';
                    deleteButton.addEventListener('click', () => card.remove());
                    card.appendChild(deleteButton);

                    taskList.appendChild(card);

                    taskTitle.value = '';
                    taskDescription.value = '';
                    taskDate.value = '';
                    taskFrom.value = '';
                    taskTo.value = '';
                }
            });
        </script>
    </body>
</html>
