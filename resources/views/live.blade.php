<x-guest-layout>
        <div>
            <h1>Now Serving</h1>
            @foreach ($registrars as $registrar)
                @if ($registrar->currentQueue)
                    <div>Registrar {{ $registrar->id }} Queue {{ $registrar->currentQueue->number }}</div>
                @endif
            @endforeach
        </div>
        <div>
            <h1>Queues</h1>
                @foreach ($queues as $queue)
                    <div>{{ $queue->number }}</div>
                @endforeach
        </div>
</x-guest-layout>
