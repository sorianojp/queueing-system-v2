<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Queues') }}
        </h2>
    </x-slot>
            @if ($nowServing)
                <h1 class="text-2xl font-black">Now Serving</h1>
                <div>{{ $nowServing->number }}</div>
                <form method="POST" action="{{ route('served', $nowServing->id )}}">
                    @csrf
                    <x-primary-button type="submit">Done</x-primary-button>
                </form>
                <button id="repeat-last-message">Repeat Last Message</button>
            @else
                <h1>No queue is currently being served.</h1>
                <form method="POST" action="{{ route('callQueue') }}">
                    @csrf
                    <x-primary-button type="submit">Call Next</x-primary-button>
                </form>
            @endif
                <h1>Queues</h1>
                @foreach ($queues as $queue)
                    <div>{{ $queue->number }}</div>
                @endforeach
</x-app-layout>
