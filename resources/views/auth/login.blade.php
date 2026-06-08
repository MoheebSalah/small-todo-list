<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="min-h-[70vh] flex items-center justify-center px-4 bg-gray-50">

        <div class="w-full max-w-md bg-white border border-gray-200 shadow-lg rounded-2xl p-8">

            <!-- Title -->
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">
                Welcome Back
            </h1>

            <p class="text-center text-gray-500 text-sm mb-8">
                Sign in to continue managing your tasks
            </p>

            <form method="POST" action="/login" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="mail@example.com"
                           autofocus
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('email') border-red-500 @enderror">

                    @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           placeholder="••••••••"
                           class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none @error('password') border-red-500 @enderror">

                    @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center space-x-2">
                    <input type="checkbox"
                           name="remember"
                           class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">

                    <label class="text-sm text-gray-600">
                        Remember me
                    </label>
                </div>

                <!-- Button -->
                <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-lg transition">
                    Sign In
                </button>
            </form>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="px-3 text-sm text-gray-400">OR</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <!-- Register link -->
            <p class="text-center text-sm text-gray-600">
                Don't have an account?
                <a href="/register"
                   class="text-indigo-600 hover:underline font-medium">
                    Register
                </a>
            </p>

        </div>
    </div>
</x-layout>
