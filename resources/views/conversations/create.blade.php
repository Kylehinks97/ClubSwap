<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                SEND MESSAGE
            </h2>
            <p class="mb-4">Reach out to make a swap</p>
        </header>

        <form action="/conversations" method="POST" enctype="multipart/form-data">
            @csrf
           <input type="hidden" name="user_id_two" value="{{ $recipientUser->id }}">

            <div class="mb-4">
                <label for="message" class="inline-block text-md mb-1">Message</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="message" id="message"
                    placeholder="Type your message here...">{{ old('message') }}</textarea>

                @error('message')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                Recipient Name: {{ $recipientUser->name }}
                Recipient Email: {{ $recipientUser->email }}
                Recipient Location: {{ $recipientUser->location }}
            </div>

            <div class="mb-4">
                <button class="bg-black text-white rounded py-2 px-4 hover:bg-cslightgreen">
                    Send Message
                </button>
                <a href="/" class="text-black ml-4 hover:text-cslightgreen hover:underline"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
