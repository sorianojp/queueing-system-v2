@foreach ($queues as $queue)
    <div class="queue-item text-3xl font-bold">{{ $queue->name }}-{{ $queue->number }}</div>
@endforeach
