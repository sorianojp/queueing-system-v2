<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="sm:max-w-2xl space-y-1 text-md">
            <div>
                <span>
                    For Transfer Credentials/OTR submission, proceed directly to Window R5.
                    <span class="text-blue-900 font-semibold">No queue required.</span>
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
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="uppercase text-5xl font-black mb-10">Get Your Queue Number</h1>
            <form method="POST" action="{{ route('getQueue') }}">
                @csrf
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <x-input-label for="dept" :value="__('Select Department')" />
                        <x-select id="dept" name="dept" class="block w-full">
                            @foreach ($departments as $department)
                                <option {{ $department->status == 0 ? 'disabled' : '' }}>
                                    {{ $department->name }}{{ $department->status == 0 ? ' (Cut Off! Contact the Department)' : '' }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>
                    <div>
                        <x-input-label for="name" :value="__('Enter Your Name')" />
                        <x-text-input id="name" name="name" type="text" required placeholder="Name"
                            class="block w-full" autofocus />
                    </div>
                </div>
                <div class="flex justify-end mt-2">
                    <x-primary-button id="submitBtn" type="submit">Get Queue</x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.querySelector('form[method="POST"]');
            var submitBtn = document.getElementById('submitBtn');
            form.addEventListener('submit', function() {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Processing...';
            });
        });
    </script>
</x-guest-layout>
