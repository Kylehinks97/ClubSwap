<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Conversation with {{ $recipientName }}
            </h1>
        </header>

        <!-- Chat Box for Message History -->
        <div class="bg-white p-6 rounded-lg shadow-lg overflow-scroll" style="height: 400px;">
            @foreach ($messages as $message)
                <div class="{{ $message->user_id == auth()->id() ? 'text-right' : '' }}">
                    <div class="inline-block bg-gray-200 rounded-lg px-4 py-2 my-2 {{ $message->user_id == auth()->id() ? 'bg-blue-200 ml-4' : 'mr-4' }}">
                        {{ $message->text }}
                    </div>
                    <br>
                    <span class="text-xs text-gray-600">
                        {{ $message->created_at->diffForHumans() }}
                    </span>
                </div>
            @endforeach
        </div>

        <!-- New Message Form -->
        <form method="POST" action="" class="mt-6">
            @csrf
            <textarea class="w-full border border-gray-300 rounded p-2" name="message" rows="4" placeholder="Type your message here..."></textarea>
            @error('message')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600 mt-2">
                Send Message
            </button>
        </form>
    </x-card>
</x-layout>
