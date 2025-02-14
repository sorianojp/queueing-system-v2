<x-guest-layout>
    <div class="grid grid-cols-3 uppercase h-screen">
        <!-- Bottom Row: Note -->
        <div class="col-span-3 border-r-2 p-4">
            <h1 class="text-3xl font-black mb-4 sticky top-0 text-white z-10 p-2 bg-blue-950 ">Note</h1>
            <div class="space-y-2">
                <div class="text-lg">
                    <p>
                        For Transfer Credentials/OTR submission, proceed directly to Window R5. <span
                            class="text-blue-900 font-semibold">No queue required.</span>
                    </p>
                </div>
                @if ($departments->where('status', 0)->isNotEmpty())
                    <div class="text-lg">
                        <p>
                            Queue full for
                            <span class="text-red-800 font-semibold">
                                @foreach ($departments->where('status', 0) as $department)
                                    {{ $department->name }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </span>
                        </p>
                        <p>
                            Kindly proceed to Window <span class="text-red-800 font-semibold">A1</span> or <span
                                class="text-red-800 font-semibold">A2</span> for further assistance. Thank you!
                        </p>
                    </div>
                @endif
            </div>
        </div>
        <!-- Left Column: Now Serving -->
        <div class="col-span-2 border-r-2 p-4 overflow-auto">
            <!-- Sticky header -->
            <h1 class="text-3xl font-black mb-4 sticky top-0 text-white z-10 p-2 bg-blue-950 ">Now Serving</h1>
            <div id="now-serving" class="grid grid-cols-3 gap-2">
                @include('partials.liveservings')
            </div>
        </div>
        <!-- Middle Column: Queues -->
        <div class="p-4 overflow-auto">
            <h1 class="text-3xl font-black mb-4 sticky top-0 text-white z-10 p-2 bg-blue-950 ">Up Next</h1>
            <div id="queues-list">
                @include('partials.livequeues')
            </div>
        </div>
    </div>
</x-guest-layout>
