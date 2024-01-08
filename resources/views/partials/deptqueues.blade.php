@foreach ($queues as $queue)
    <span class="deptqueue-item text-xl font-bold">{{ $queue->name }} {{ $queue->number }}, </span>
@endforeach
