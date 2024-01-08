@foreach ($users as $user)
    @if ($user->currentQueue)
        <div class="now-serving text-7xl font-light my-4 bg-white rounded-lg p-4 shadow-md">
            <span class="font-black">{{ $user->currentQueue->name }} {{ $user->currentQueue->number }}</span> -
            <span class="text-red-600">{{ $user->name }}</span>
        </div>
    @endif
@endforeach
