<x-layout>
    <x-card class="p-10">
        <style>
            #scrollable-div {
                height: 400px;
                overflow-y: auto;
                background-color: white;
                padding: 6px;
                /* This is equivalent to rounded-lg in Tailwind */
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                /* This mimics shadow-lg in Tailwind */
            }

            /* Optional: Custom scrollbar styles */
            #scrollable-div::-webkit-scrollbar {
                width: 10px;
            }

            #scrollable-div::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            #scrollable-div::-webkit-scrollbar-thumb {
                background: #888;
            }

            #scrollable-div::-webkit-scrollbar-thumb:hover {
                background: #555;
            }

            .custom-rounded {
                border-radius: 0.5rem;
                /* Apply rounding to all corners */
                border-top-left-radius: 0;
                /* Remove rounding from top-left corner */
            }

            .fit-content {
                display: inline-block;
                width: fit-content;
                max-width: 100%;
                /* Optional: To ensure it doesn't overflow its container */
            }

            .message {
                margin: .5em;
            }

            .message-left,
            .message-right {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
                /* or your desired spacing */
            }

            .message-left .message-content {
                background-color: #000;
                /* or your desired color */
                color: white;
                margin-right: auto;
                /* aligns the bubble to the left */
            }

            .message-right .message-content {
                background-color: #379634;
                /* or your desired color */
                color: white;
                margin-left: auto;
                /* aligns the bubble to the right */
            }

            .message-content {
                padding: 8px 15px;
                border-radius: 15px;
                max-width: 70%;
            }

        </style>

        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Conversation with {{ $recipientName }}
            </h1>
        </header>
        <!-- Chat Box for Message History -->
        <div id='scrollable-div' class="bg-white p-6 rounded-lg shadow-lg overflow-y-auto" style="height: 400px;">
            @foreach ($messages as $message)
                <strong>{{ $message->user_id }}</strong>
                <strong>{{ auth()->id() }}</strong>
                <div class="{{ $message->user_id == auth()->id() ? 'message-left' : 'message-right' }} message">
                    <div class="message-content custom-rounded fit-content px-4 py-2 my-2 ml-4">
                        {{ $message->body }}
                    </div>
                    <br>
                    @if ($loop->last)
                        <span class="text-xs text-gray-600">
                            {{ $message->created_at->diffForHumans() }}
                        </span>
                    @endif
                </div>
            @endforeach
        </div>
        <!-- New Message Form -->
        <form method="POST" action="{{ route('conversations.messages.store', $conversationId) }}" class="mt-6">
            @csrf
            <textarea class="w-full border border-gray-300 rounded p-2" name="message" rows="4"
                placeholder="Type your message here..."></textarea>
            @error('message')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="bg-black hover:bg-cslightgreen py-2 px-4  mt-2 text-white">
                Send Message
            </button>
        </form>
    </x-card>
</x-layout>
