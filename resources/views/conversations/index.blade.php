<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Conversations
            </h1>
        </header>
        
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($conversations->isEmpty())
                    @foreach ($conversations as $conversation)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="{{ route('conversations.show', $conversation->id) }}" class="hover:underline">
                                    {{ $conversation->last_message }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No conversations found</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>

        <div class="mt-6 p-4">
            {{ $conversations->links() }}
        </div>
    </x-card>
</x-layout>
