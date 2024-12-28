<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-700 text-center">Register</h2>
        <form class="mt-6" wire:submit.prevent="createNewUser">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-medium mb-2">Full Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Enter your full name"
                    wire:model="name"
                    value="{{ old('name') }}"
                />
                @error('name')
                    <span class="bg-white text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-medium mb-2">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Enter your email"
                    wire:model="email"
                    value="{{ old('email') }}"
                />
                @error('email')
                    <span class="bg-white text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-600 font-medium mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Enter your password"
                    wire:model="password"
                />
                @error('password')
                    <span class="bg-white text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-600 font-medium mb-2">Confirm Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation"
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Confirm your password"
                    wire:model="password_confirmation"
                />
                @error('password_confirmation')
                    <span class="bg-white text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
                Register
            </button>
        </form>
        <p class="mt-4 text-sm text-gray-600 text-center">
            Already have an account? <a href="{{ route('sign_in') }}" class="text-blue-500 hover:underline" wire:navigate>Sign In</a>
        </p>
    </div>
</div>