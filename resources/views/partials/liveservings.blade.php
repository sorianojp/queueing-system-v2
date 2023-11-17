@foreach ($registrars as $registrar)
    @if ($registrar->currentQueue)
        <div class="now-serving text-5xl font-bold">{{ $registrar->currentQueue->number }} at Registrar
            {{ $registrar->id }}</div>
    @endif
@endforeach
