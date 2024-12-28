@if (session('error'))
    <div class="bg-red-500 text-white p-3">{{ session('error') }}</div>
@elseif (session('success'))
    <div class="bg-green-500 text-white p-3">{{ session('success') }}</div>
@endif