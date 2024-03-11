<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            <div class="flex justify-end my-2">
                <x-primary-button><a href="{{ route('departments.create') }}">Add</a></x-primary-button>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ ++$i }}</td>
                                <td class="px-6 py-4">{{ $department->name }}</td>
                                <td class="px-6 py-4">
                                    @if ($department->status == 1)
                                        <form action="{{ route('deactivate', $department) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-primary-button type="submit">Deactivate</x-primary-button>
                                        </form>
                                    @else
                                        <x-primary-button><a
                                                href="{{ route('activate', $department) }}">Activate</a></x-primary-button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-guest-layout>
