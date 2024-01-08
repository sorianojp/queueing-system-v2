<x-guest-layout>
    <div class="flex justify-center">
        <form method="POST" action="{{ route('logout') }}" class="flex space-x-2 items-center">
            @csrf
            <div class="text-xl font-bold uppercase">Account: {{ Auth::user()->name }}</div>
            <button class="font-medium text-md text-red-600 hover:underline lowercase" type="submit">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
    <div class="grid grid-cols-3 uppercase">
        <div class="col-span-2 h-screen p-5 text-center">
            <h1 class="text-7xl font-black mb-10">Now Serving</h1>
            @if ($nowServing)
                <div class="text-7xl font-bold text-blue-900">{{ $nowServing->name }} {{ $nowServing->number }}</div>
                <div class="flex justify-center space-x-2 my-4">
                    <form method="POST" action="{{ route('served', $nowServing->id) }}">
                        @csrf
                        <x-primary-button type="submit">Done</x-primary-button>
                    </form>
                    <form method="POST" action="{{ route('notify') }}">
                        @csrf
                        <x-secondary-button type="submit">Notify</x-secondary-button>
                    </form>
                </div>
            @else
                <h1>No queue is currently being served.</h1>
                <form method="POST" action="{{ route('callQueue') }}">
                    @csrf
                    <x-primary-button type="submit">Call Next</x-primary-button>
                </form>
            @endif
        </div>
        <div class="h-screen p-5">
            <h1 class="text-7xl font-black mb-10">Queues</h1>
            <div id="deptqueues-list">
                @include('partials.deptqueues')
            </div>
        </div>
    </div>
</x-guest-layout>
