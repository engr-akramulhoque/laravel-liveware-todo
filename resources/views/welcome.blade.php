<x-layouts.app>
    <!-- Add New Task Section -->
    <div class="mb-6 bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Add New Task</h2>
        <form class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <div class="col-span-1 md:col-span-2 lg:col-span-4">
                <label for="taskTitle" class="block text-gray-700 mb-1">Task Title</label>
                <input id="taskTitle" type="text" placeholder="Task Title" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="col-span-1 md:col-span-2 lg:col-span-4">
                <label for="taskDescription" class="block text-gray-700 mb-1">What To Do</label>
                <textarea id="taskDescription" placeholder="Describe your task..." class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            </div>
            <div>
                <label for="taskDate" class="block text-gray-700 mb-1">Date</label>
                <input id="taskDate" type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="col-span-2">
                <label class="block text-gray-700">
                    <span class="mb-1 block">Duration</span>
                    <div class="flex gap-2">
                        <label for="taskFrom" class="sr-only">From</label>
                        <input id="taskFrom" type="time" class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <label for="taskTo" class="sr-only">To</label>
                        <input id="taskTo" type="time" class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    </div>
                </label>
            </div>
            <div class="col-span-1 md:col-span-2 lg:col-span-4">
                <button id="addTaskButton" type="button" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">Add Task</button>
            </div>
        </form>
    </div>

    <!-- Task List Section -->
    <div class="mb-6 bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Your Tasks</h2>
        <!-- Filter Section -->
        <div class="mb-4">
            <label for="taskSearch" class="block text-gray-700 mb-2">Search Tasks</label>
            <input id="taskSearch" type="text" placeholder="Search by title..." class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div class="flex flex-wrap gap-2 mb-6">
            <button class="px-4 py-2 bg-gray-200 rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">All</button>
            <button class="px-4 py-2 bg-gray-200 rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">Completed</button>
            <button class="px-4 py-2 bg-gray-200 rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">Pending</button>
        </div>
        <div id="taskList" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            <!-- Task Cards will be dynamically added here -->
            <div class="bg-gray-50 p-4 rounded-lg shadow flex flex-col justify-between">
                <div>
                    <h3 class="font-bold text-lg text-gray-800">Sample Task</h3>
                    <p class="text-sm text-gray-600">Date: 2024-01-01</p>
                    <p class="text-sm text-gray-600">From: 10:00 AM - To: 11:00 AM</p>
                </div>
                <button class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
            </div>
        </div>
    </div>

    <div class="logout">
        <a href="{{ route('logout') }}" class="w-full px-4 py-2 bg-gray-200 text-gray-800 rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">Logout</a>
    </div>
</x-layouts.app>

