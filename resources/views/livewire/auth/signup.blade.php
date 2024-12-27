<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-700 text-center">Register</h2>
        <form class="mt-6">
            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-medium mb-2">Full Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    required 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Enter your full name"
                />
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-medium mb-2">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Enter your email"
                />
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-600 font-medium mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Enter your password"
                />
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-600 font-medium mb-2">Confirm Password</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Confirm your password"
                />
            </div>
            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
                Register
            </button>
        </form>
        <p class="mt-4 text-sm text-gray-600 text-center">
            Already have an account? <a href="{{ route('sign-in') }}" class="text-blue-500 hover:underline" wire:navigate>Login</a>
        </p>
    </div>
</div>