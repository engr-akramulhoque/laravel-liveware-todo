<x-layouts.app>
    <!-- Add New Task Section -->
    <livewire:todo.add-todo>

    <!-- Task List Section -->
    <livewire:todo.todo-list>

    <div class="logout">
        <a href="{{ route('logout') }}" class="w-full px-4 py-2 bg-gray-200 text-gray-800 rounded-lg shadow-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">Logout</a>
    </div>
</x-layouts.app>

