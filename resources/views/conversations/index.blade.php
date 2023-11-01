<x-layout>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y4 md:space-y-0 mx-4">

        @unless (count($conversations) == 0)
            @foreach ($conversations as $conversation)
                <x-conversation-card :conversation="$conversation" />
            @endforeach
        @else
            <p>No conversations</p>
        @endunless

    </div>

    <div class="mt-6 p-4">
        {{ $conversations->links() }}
    </div>

</x-layout>
