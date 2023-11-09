@foreach ($queues as $queue)
    <div class="queue-item">{{ $queue->number }}</div>
@endforeach
