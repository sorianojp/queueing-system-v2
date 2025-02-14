@foreach ($queues as $queue)
    <span class="queue-item text-lg font-bold mr-4">{{ $queue->name }} {{ $queue->number }}, </span>
@endforeach
