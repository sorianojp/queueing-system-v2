<x-guest-layout>
    <div class="grid grid-cols-4 uppercase text-center">
        <div class="col-span-3 h-screen p-10 border-r-2 overflow-auto">
            <h1 class="text-7xl font-black mb-10">Now Serving</h1>
            <div id="now-serving">
                @include('partials.liveservings')
            </div>
        </div>
        <div class="h-screen p-10 overflow-auto">
            <h1 class="text-7xl font-black mb-10">Queues</h1>
            <div id="queues-list">
                @include('partials.livequeues')
            </div>
        </div>
    </div>
</x-guest-layout>
