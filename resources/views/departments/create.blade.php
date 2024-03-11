<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="uppercase text-xl font-black">Enter Department Name</h1>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
            <div>
                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input type="text" name="name" placeholder="Enter Department Name"
                            class="block w-full" />
                    </div>
                    <div class="flex justify-end mt-2">
                        <x-primary-button type="submit">Submit</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
