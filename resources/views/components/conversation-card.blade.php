@props(['conversation'])

<x-card>
    <div class="flex">
        <div>
            <p>{{ $conversation->last_message }}</p>
        </div>
    </div>
</x-card>