<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <!---- Error Alert ----->
        <x-alerts.alert />
        <h2 class="text-2xl font-bold text-gray-700 text-center">Login</h2>
        <form class="mt-6" wire:submit.prevent="signIn">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-medium mb-2">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    wire:model="email"
                />
                <div class="text-red-500">@error('email') {{ $message }} @enderror</div>
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
                <div class="text-red-500">@error('password') {{ $message }} @enderror</div>
            </div>
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <input 
                        type="checkbox" 
                        id="remember" 
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                    />
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>
                <a href="#" class="text-sm text-blue-500 hover:underline">Forgot password?</a>
            </div>
            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
                Login
            </button>
        </form>
        <p class="mt-4 text-sm text-gray-600 text-center">
            Don't have an account? <a href="{{ route('sign_up') }}" class="text-blue-500 hover:underline" wire:navigate>Sign up</a>
        </p>
    </div>
</div>
