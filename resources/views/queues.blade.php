<x-guest-layout>
    <div class="grid grid-cols-3 uppercase">
        <div class="col-span-2 h-screen p-5 text-center">
            <h1 class="text-7xl font-black mb-10">Now Serving</h1>
            @if ($nowServing)
                <div class="text-5xl font-bold">{{ $nowServing->number }}</div>
                <form method="POST" action="{{ route('served', $nowServing->id) }}">
                    @csrf
                    <x-secondary-button type="submit">Done</x-secondary-button>
                </form>
            @else
                <h1>No queue is currently being served.</h1>
                <form method="POST" action="{{ route('callQueue') }}">
                    @csrf
                    <x-secondary-button type="submit">Call Next</x-secondary-button>
                </form>
            @endif
        </div>
        <div class="h-screen p-5 text-center">
            <h1 class="text-7xl font-black mb-10">Queues</h1>
            @foreach ($queues as $queue)
                <span class="text-5xl font-bold">{{ $queue->number }}, </span>
            @endforeach
        </div>
    </div>
</x-guest-layout>
