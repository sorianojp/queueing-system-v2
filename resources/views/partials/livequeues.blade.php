@foreach ($queues as $queue)
    <span class="queue-item text-lg font-bold mr-4 bg-gray-300 rounded-sm">{{ $queue->name }} {{ $queue->number }},
    </span>
@endforeach
