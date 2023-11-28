@foreach ($users as $user)
    @if ($user->currentQueue)
        <div class="now-serving text-5xl font-light my-4">
            <span class="font-black">{{ $user->currentQueue->name }}-{{ $user->currentQueue->number }}</span> at
            <span class="text-red-600">{{ $user->name }}</span>
        </div>
    @endif
@endforeach
