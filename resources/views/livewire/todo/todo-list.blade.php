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
        @foreach ($todos as $todo)
        <div class="bg-gray-50 p-4 rounded-lg shadow flex flex-col justify-between">
            <div>
                <h3 class="font-bold text-lg text-gray-800 pb-3">{{ $todo->title }}</h3>
                <p class="text-sm text-gray-600 pb-2">Description: {{ Str::limit($todo->description, 150, '...') }}</p>
                <p class="text-sm text-gray-600">Date: {{ $todo->date }}</p>
                <p class="text-sm text-gray-600">From: {{ $todo->from }} - To: {{ $todo->to }}</p>
            </div>
            <button class="mt-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Delete</button>
        </div> 
        @endforeach
    </div>
</div>