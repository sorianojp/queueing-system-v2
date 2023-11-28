<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div
            class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg uppercase space-y-6">
            <h1 class="text-5xl font-black">Reports</h1>

            <div>
                <h1 class="text-2xl font-black">Total</h1>
                <div class="flex space-x-2">
                    <div>Today:{{ $qToday }}</div>
                    <div>Finished:{{ $qFinished }}</div>
                    <div>Pending:{{ $qPending }}</div>
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-black">Registrar</h1>
                <div class="flex space-x-2">
                    <div>Registrar:{{ $RqToday }}</div>
                    <div>Registrar Finished:{{ $RqFinished }}</div>
                    <div>Registrar Pending:{{ $RqPending }}</div>
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-black">Cashier</h1>
                <div class="flex space-x-2">
                    <div>Cashier:{{ $CqToday }}</div>
                    <div>Cashier Finished:{{ $CqFinished }}</div>
                    <div>Cashier Pending:{{ $CqPending }}</div>
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-black">Sao</h1>
                <div class="flex space-x-2">
                    <div>SAO:{{ $SqToday }}</div>
                    <div>SAO Finished:{{ $SqFinished }}</div>
                    <div>SAO Pending:{{ $SqPending }}</div>
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-black">Acad</h1>
                <div class="flex space-x-2">
                    <div>ACAD:{{ $AqToday }}</div>
                    <div>ACAD Finished:{{ $AqFinished }}</div>
                    <div>ACAD Pending:{{ $AqPending }}</div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
