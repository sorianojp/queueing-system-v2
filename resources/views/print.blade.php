<x-guest-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="text-center uppercase">
            <div class="mb-6" id="ticketContents">
                <div class="text-2xl font-black tracking-wide">QUEUE NO.</div>
                <div class="text-md font-black">{{ strtoupper($data['name']) }}</div>
                <div class="text-2xl font-black">{{ strtoupper($data['number']) }}</div>
            </div>
            <a href="{{ route('queueForm') }}" onclick="printTicket()">
                <x-secondary-button>
                    Print
                </x-secondary-button>
            </a>
        </div>
    </div>
    <script>
        function printTicket() {
            var printContents = document.getElementById('ticketContents').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</x-guest-layout>
