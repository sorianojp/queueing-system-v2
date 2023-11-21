@foreach ($users as $user)
    @if ($user->currentQueue)
        <div class="now-serving text-5xl font-bold my-4">
            {{ $user->currentQueue->name }}-{{ $user->currentQueue->number }} at
            <span class="text-red-600">{{ $user->name }}</span>
        </div>
    @endif
@endforeach
