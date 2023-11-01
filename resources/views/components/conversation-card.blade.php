@props(['conversation'])

<x-card>
    <div class="flex">
        <div>
            <p>{{ $conversations->last_message }}</p>
        </div>
    </div>
</x-card>