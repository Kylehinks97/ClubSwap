<x-layout>
    <x-card class="p-10 max-w-lg mx-auto">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Create an account to post clubs</p>
        </header>

        <form method="POST" action="/users">
            @csrf

            <div class="mb-4">
                <label for="name" class="inline-block text-md mb-1">
                    Name
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-1 w-full" 
                    id="name"
                    name="name"
                    value="{{ old('name') }}"/>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="inline-block text-md mb-1">Email</label>
                <input
                    type="email"
                    class="border border-gray-200 rounded p-1 w-full"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"/>

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="inline-block text-md mb-1">
                    Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-1 w-full"
                    id="password" 
                    name="password"
                    value="{{ old('password') }}"/>

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="inline-block text-md mb-1">
                    Confirm Password
                </label>
                <input
                    type="password"
                    class="border border-gray-200 rounded p-1 w-full"
                    id="password_confirmation"
                    name="password_confirmation" 
                    value="{{ old('password_confirmation') }}"/>

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6  flex justify-center">
                <button type="submit" class="bg-black w-full text-white rounded py-2 px-4 hover:bg-cslightgreen">
                    Sign Up
                </button>
            </div>

            <div class="mt-8 flex justify-center">
                <p>
                    Already have an account?
                    <a href="/login" class="text-cslightgreen hover:underline">Login</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
