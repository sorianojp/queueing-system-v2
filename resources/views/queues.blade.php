<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Queues') }}
        </h2>
    </x-slot>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 my-12">
        <div class="w-full sm:max-w-5xl">
            <div class="grid grid-cols-2 gap-2">
                @if ($nowServing)
                    <div class="p-6 bg-white shadow-md overflow-hidden sm:rounded-lg uppercase flex items-center grid justify-items-center text-center">
                        <h1 class="text-2xl font-black">Now Serving</h1>
                        <div>
                            <div class="font-black text-9xl">{{ $nowServing->number }}</div>
                            <div>
                                <form method="POST" action="{{ route('served', $nowServing->id )}}">
                                    @csrf
                                    <x-primary-button type="submit">Done</x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                <div class="p-6 bg-white shadow-md overflow-hidden sm:rounded-lg uppercase flex items-center grid justify-items-center text-center">
                    <div>
                        <h1>No queue is currently being served.</h1>
                        <form method="POST" action="{{ route('callQueue') }}">
                            @csrf
                            <x-primary-button type="submit">Call Next</x-primary-button>
                        </form>
                    </div>
                </div>
                @endif
                <div class="p-6 bg-blue-900 shadow-md overflow-hidden sm:rounded-lg uppercase text-white">
                    <h1 class="text-2xl font-black mb-6">Queues</h1>
                    <ul>
                        @foreach ($queues as $queue)
                            <li>Queue #{{ $queue->number }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
