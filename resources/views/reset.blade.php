<x-guest-layout>
    @foreach ($unservedQueuesYesterday as $i)
        <div class="deptqueue-item text-3xl font-bold">{{ $i->name }}-{{ $i->number }}</div>
        <form action="{{ route('destroyunserve', $i->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <x-primary-button type="submit">Delete</x-primary-button>
        </form>
    @endforeach
</x-guest-layout>
