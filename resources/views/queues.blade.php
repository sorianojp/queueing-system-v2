<x-guest-layout>
    <form method="POST" action="{{ route('logout') }}" class="flex space-x-2 items-center">
        @csrf
        <div class="text-xl font-bold uppercase">Account: {{ Auth::user()->name }}</div>
        <x-primary-button :href="route('logout')"
            onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-primary-button>
    </form>
    <div class="grid grid-cols-3 uppercase">
        <div class="col-span-2 h-screen p-5 text-center">
            <h1 class="text-7xl font-black mb-10">Now Serving</h1>
            @if ($nowServing)
                <div class="text-5xl font-bold">{{ $nowServing->number }}</div>
                <form method="POST" action="{{ route('served', $nowServing->id) }}">
                    @csrf
                    <x-secondary-button type="submit">Done</x-secondary-button>
                </form>
            @else
                <h1>No queue is currently being served.</h1>
                <form method="POST" action="{{ route('callQueue') }}">
                    @csrf
                    <x-secondary-button type="submit">Call Next</x-secondary-button>
                </form>
            @endif
        </div>
        <div class="h-screen p-5 text-center">
            <h1 class="text-7xl font-black mb-10">Queues</h1>
            @foreach ($queues as $queue)
                <span class="text-5xl font-bold">{{ $queue->number }}, </span>
            @endforeach
        </div>
    </div>
</x-guest-layout>
