@foreach ($users as $user)
    @if ($user->currentQueue)
        <div class="now-serving text-3xl font-bold my-4">
            {{ $user->currentQueue->name }}-{{ $user->currentQueue->number }} at
            <span class="text-5xl">{{ $user->name }}</span>
        </div>
    @endif
@endforeach
