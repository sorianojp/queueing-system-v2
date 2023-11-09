@foreach ($registrars as $registrar)
    @if ($registrar->currentQueue)
        <div>Registrar {{ $registrar->id }} Queue {{ $registrar->currentQueue->number }}</div>
    @endif
@endforeach
