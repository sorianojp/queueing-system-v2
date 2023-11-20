@foreach ($registrars as $registrar)
    @if ($registrar->currentQueue)
        <div class="now-serving text-3xl font-bold my-4">{{ $registrar->currentQueue->name }}
            {{ $registrar->currentQueue->number }} at
            <span class="text-5xl">{{ $registrar->name }}</span>
        </div>
    @endif
@endforeach
