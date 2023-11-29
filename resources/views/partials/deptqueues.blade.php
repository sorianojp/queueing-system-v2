@foreach ($queues as $queue)
    <div class="deptqueue-item text-3xl font-bold">{{ $queue->name }}-{{ $queue->number }}</div>
@endforeach
