<x-guest-layout>
    <h1>Get Your Queue Number</h1>
    <form method="POST" action="{{ route('getQueue') }}">
        @csrf
        <x-primary-button type="submit">Get Queue</x-primary-button>
    </form>
</x-guest-layout>
