<x-guest-layout>
    <div class="grid grid-cols-2 gap-2">
        <div class="p-6 space-y-6 uppercase">
            <h1 class="text-5xl font-black">Now Serving</h1>
            @foreach ($registrars as $registrar)
                @if ($registrar->currentQueue)
                    <div class="px-6 py-4 bg-white overflow-hidden sm:rounded-lg text-center">
                        <div class="font-black text-2xl">Registrar {{ $registrar->id }}</div>
                        <div><span class="font-black text-9xl">{{ $registrar->currentQueue->number }}</div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="p-6 uppercase">
            <h1 class="text-5xl font-black mb-6">Queues</h1>
                @foreach ($queues as $queue)
                    <span class="font-black text-3xl">
                        {{ $queue->number }},
                    </span>
                @endforeach
        </div>
    </div>
</x-guest-layout>
