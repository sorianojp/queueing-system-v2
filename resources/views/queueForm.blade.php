<x-guest-layout>
    <form method="POST" action="{{ route('getQueue') }}">
        @csrf
        <x-primary-button type="submit">Get Queue</x-primary-button>
    </form>
</x-guest-layout>
