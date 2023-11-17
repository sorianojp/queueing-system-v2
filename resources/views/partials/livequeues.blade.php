@foreach ($queues as $queue)
    <span class="queue-item text-5xl font-bold">{{ $queue->number }}, </span>
@endforeach
