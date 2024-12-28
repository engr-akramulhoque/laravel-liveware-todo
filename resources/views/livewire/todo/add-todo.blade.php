<div class="mb-6 bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Add New Todo Task</h2>
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
