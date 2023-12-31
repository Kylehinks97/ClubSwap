<x-layout>
    <x-card class="p-10 max-w-lg mx-auto">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Login
            </h2>
            <p class="mb-4">Log into your account to post clubs</p>
        </header>

        <form method="POST" action="/users/authenticate">
            @csrf

            <div class="mb-4">
                <label for="email" class="inline-block text-md mb-1">Email</label>
                <input type="email" class="border border-gray-200 rounded p-1 w-full" id="email" name="email"
                    value="{{ old('email') }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                
            </div>

            <div class="mb-4">
                <label for="password" class="inline-block text-md mb-1">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-1 w-full" id="password" name="password"
                    value="{{ old('password') }}" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4  flex justify-center">
                <button type="submit" class="bg-black w-full text-white rounded py-2 px-4 hover:bg-cslightgreen">
                    Sign In
                </button>
            </div>

            <div class="mt-8 flex justify-center">
                <p>
                    Don't have an account?
                    <a href="/register" class="text-cslightgreen hover:underline ">Register</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
