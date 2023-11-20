<x-guest-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="text-center uppercase">
            <div class="mb-6" id="ticketContents" style="font-size: 14px; line-height: 1.5;">
                <div class="text-2xl font-black">Queue No.</div>
                <div class="text-xl font-black">{{ $queueNumber }}</div>
                <div class="text-lg">{{ $name }}</div>
            </div>
            <x-primary-button onclick="printTicket()">
                Print Ticket
            </x-primary-button>
            <a href="{{ route('queueForm') }}">
                <x-secondary-button>
                    Back to Queue Form
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
