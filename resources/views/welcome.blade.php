<x-layouts.app>
    <!-- Add New Task Section -->
    <x-alerts.alert />

    <!-- Task List Section -->
    <livewire:todo.todo-list>

    <div class="w-full items-center text-center">
        <a href="{{ route('logout') }}" class="px-4 py-2 bg-red-200 text-red-800 rounded-lg shadow-md hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-red-400">Logout</a>
    </div>
</x-layouts.app>

