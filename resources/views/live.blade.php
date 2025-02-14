<x-guest-layout>
    <div class="grid grid-cols-3 uppercase h-screen">
        <!-- Bottom Row: Note -->
        <div class="col-span-3 mb-2 font-extrabold">
            <h1 class="text-3xl font-black sticky top-0 text-white z-10 p-2 bg-blue-950 ">Note</h1>
            <div class="space-y-1 text-2xl">
                <div>
                    <span>
                        For Transfer Credentials/OTR submission, proceed directly to Window R5. <span
                            class="text-blue-900 font-semibold">No queue required.</span>
                    </span>
                </div>
                @if ($departments->where('status', 0)->isNotEmpty())
                    <div>
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
                        {{-- Display the registrar-specific message only if Registrar is in the list --}}
                        @if (
                            $departments->where('status', 0)->contains(function ($department) {
                                return $department->name === 'Registrar';
                            }))
                            <p>
                                For <span class="text-red-800 font-semibold">Registrar</span> Kindly proceed to Window
                                <span class="text-red-800 font-semibold">A1</span>
                                or <span class="text-red-800 font-semibold">A2</span> for further assistance. Thank you!
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
        <!-- Left Column: Now Serving -->
        <div class="col-span-2 border-r-2 overflow-auto">
            <!-- Sticky header -->
            <h1 class="text-3xl font-black mb-4 sticky top-0 text-white z-10 p-2 bg-blue-950 ">Now Serving</h1>
            <div id="now-serving" class="grid grid-cols-3 gap-2">
                @include('partials.liveservings')
            </div>
        </div>
        <!-- Middle Column: Queues -->
        <div class="overflow-auto">
            <h1 class="text-3xl font-black mb-4 sticky top-0 text-white z-10 p-2 bg-blue-950 ">Up Next</h1>
            <div id="queues-list">
                @include('partials.livequeues')
            </div>
        </div>
    </div>
</x-guest-layout>
