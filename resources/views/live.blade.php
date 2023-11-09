<x-guest-layout>
        <div>
            <h1>Now Serving</h1>
            <div id="now-serving">
                @include('partials.liveservings')
            </div>
        </div>
        <div>
            <h1>Queues</h1>
            <div id="queues-list">
                @include('partials.livequeues')
            </div>
        </div>
</x-guest-layout>
