<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Posts
            </h1>
        </header>
        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($listings->isEmpty())

                    @foreach ($listings as $listing)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg hover:underline">
                                <a href="show.html">
                                    {{ $listing->title }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/listings/{{$listing->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl hover:underline"><i
                                        class="fa-solid fa-pen-to-square mr-1"></i>Edit</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/listings/{{ $listing->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:underline"><i class="fa-solid fa-trash mr-1"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray300 text-lg">
                            <p class="text-center">No listings found</p>
                        </td>
                    </tr>

                @endunless
            </tbody>
        </table>
    </x-card>
</x-layout>
