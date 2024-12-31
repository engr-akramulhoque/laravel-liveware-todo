<div class="mb-6 bg-white rounded-lg shadow p-6">
    <div class="flex justify-between">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Your Todo Tasks</h2>
        <a href="{{ route('add-todo') }}" class="px-4 py-2 bg-blue-400 rounded-lg shadow-md text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400" 
        wire:navigate="true"
        >Create Task</a>
    </div>
    <!-- Search Section -->
    <form wire:submit="searchTodo">
        <div class="mb-4">
            <label for="taskSearch" class="block text-gray-700 mb-2">Search Tasks</label>
            <div class="flex">
                <input id="taskSearch" 
                type="text" 
                placeholder="Search by title and description..." 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                name="search"
                wire:model="search"
                >
                <button type="submit" class="px-4 py-2 bg-blue-400 rounded-lg shadow-md text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">Search</button>
            </div>
            @error('search')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </form>
    <div id="taskList" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        <!-- Task Cards will be dynamically added here -->
        @foreach ($todos as $todo)
        <div class="bg-gray-50 p-4 rounded-lg shadow flex flex-col justify-between">
            <div>
                <h3 class="font-bold text-lg text-gray-800 pb-3">{{ $todo->title }}</h3>
                <p class="text-sm text-gray-600 pb-2">Description: {{ Str::limit($todo->description, 150, '...') }}</p>
                <p class="text-sm text-gray-600">Date: {{ $todo->date }}</p>
                <p class="text-sm text-gray-600">From: {{ $todo->from }} - To: {{ $todo->to }}</p>
                <p class="text-sm text-gray-600 pt-3">
                    @if ($todo->status == 'completed')
                        <span class="inline-block bg-green-500 text-white px-3 py-1 rounded-full">Completed</span>
                    @else
                        <span class="inline-block bg-yellow-500 text-white px-3 py-1 rounded-full">Pending</span>
                    @endif    
                </p>
                </p>
            </div>
            <div class="flex items-center gap-2 mt-3">
                <button 
                class="px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600"
                wire:click="markAsCompleted({{ $todo->id }})"
                onclick="return confirm('Are you sure this task is completed?')"
                >Mark as Completed</button>
                <a href="{{ route('edit-todo', $todo) }}"
                class="px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
                wire:navigate="true">Edit</a>

                <button 
                class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600" 
                wire:click="deleteTodo({{ $todo->id }})"
                onclick="return confirm('Are you sure you want to delete?')"
                >Delete</button>
            </div>
        </div>
        @endforeach
    </div>
</div>