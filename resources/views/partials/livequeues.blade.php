@foreach ($queues as $queue)
    <div class="queue-item text-lg font-bold">{{ $queue->name }} {{ $queue->number }}</div>
@endforeach
