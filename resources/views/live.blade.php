<x-guest-layout>
    <div class="grid grid-cols-3 text-white uppercase text-center">
        <div class="col-span-2 h-screen bg-sky-950 p-5">
            <h1 class="text-7xl font-black mb-10">Now Serving</h1>
            <div id="now-serving">
                @include('partials.liveservings')
            </div>
        </div>
        <div class="h-screen bg-emerald-950 p-5">
            <h1 class="text-7xl font-black mb-10">Queues</h1>
            <div id="queues-list">
                @include('partials.livequeues')
            </div>
        </div>
    </div>
</x-guest-layout>
