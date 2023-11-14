<x-guest-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="text-center">
            <h1 class="uppercase text-2xl font-black">Get Your Queue Number</h1>
            <form method="POST" action="{{ route('getQueue') }}" class="flex space-x-2 my-6">
                @csrf
                <x-text-input name="name" type="text" required placeholder="Name" />
                <x-primary-button type="submit">Get Queue</x-primary-button>
            </form>
        </div>
    </div>
</x-guest-layout>
