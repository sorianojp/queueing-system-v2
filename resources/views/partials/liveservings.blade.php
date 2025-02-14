@foreach ($users as $user)
    @if ($user->currentQueue)
        <div class="max-w-sm bg-white border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="bg-red-800 text-white p-2 font-bold">
                {{ $user->name }}
            </div>
            <div class="p-2 text-center font-semibold">
                {{ $user->currentQueue->number }}<br>
                <span class="text-blue-900 text-lg font-semibold">{{ $user->currentQueue->name }}</span>
            </div>
        </div>
    @endif
@endforeach
