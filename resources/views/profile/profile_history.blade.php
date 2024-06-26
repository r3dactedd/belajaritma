<div class="container pb-4 mx-auto my-4">
    <table class="w-full mx-auto text-xs text-white">
        <colgroup>
            <col>
            <col>
            <col>
            <col>
            <col>
        </colgroup>
        <thead class="leading-normal text-gray-600 bg-gray-200">
            <tr class="text-base leading-normal text-gray-600 bg-gray-200 md:text-lg">
                <th class="px-4 py-2 text-left">Nama Sertifikasi</th>
                <th class="px-4 py-2 text-left">Kode Pembayaran</th>
                <th class="px-4 py-2 text-left">Tanggal Upload Bukti</th>
                <th class="px-4 py-2 text-left">Status Pembayaran</th>
                <th class="px-2 py-3 text-center">Foto Bukti</th>

            </tr>
        </thead>
        <tbody class="text-base font-light text-gray-600 md:text-lg">

            @foreach ($transactionHistory as $transactions)
                <tr class="font-medium leading-normal text-gray-600 bg-white border-b border-opacity-20">

                    <td class="px-4 py-2">
                        <p class="overflow-scroll max-h-20">
                            {{ $transactions->transactionToCertification->certif_title }}
                        </p>
                    </td>
                    <td class="px-4 py-2">
                        <p class="overflow-scroll max-h-20">{{ $transactions->payment_code }}</p>
                    </td>
                    <td class="px-4 py-2">
                        <p class="overflow-scroll max-h-20">{{ $transactions->created_at->format('Y-m-d') }}</p>
                    </td>
                    <td class="px-4 py-2">
                        @if ($transactions->isApproved === null)
                            <p class="overflow-scroll text-yellow-500 max-h-20">Pending</p>
                        @elseif ($transactions->isApproved === 1)
                            <p class="overflow-scroll text-green-500 max-h-20">Diterima</p>
                        @elseif ($transactions->isApproved === 0)
                            <p class="overflow-scroll text-red-500 max-h-20">Ditolak</p>
                            {{-- @else
                            <p class="overflow-scroll text-purple-500 max-h-20">Unknown Status:
                                {{ $transactions->isApproved }}</p> --}}
                        @endif
                    </td>
                    <td class="px-6 py-3 text-center">
                        <div class="flex justify-center item-center">
                            {{-- Image here --}}
                            <a href="#" class="w-4 mr-2 transform hover:scale-110 hover:text-green-500"
                                onclick="showImagePopup('{{ asset('uploads/transaction_images/' . $transactions->transaction_proof) }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18"
                                    viewBox="0 0 576 512">
                                    <path
                                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                    <div id="image-popup"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full bg-gray-800 bg-opacity-75">
                        <div class="absolute transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                            <button type="button" onclick="hideImagePopup()"
                                class="absolute inline-flex items-center justify-center w-8 h-8 text-gray-600 bg-white rounded-full right-4 top-4 hover:bg-gray-300">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            <img src="{{ $transactions->transaction_proof }}" alt="Transaction Proof"
                                class="max-w-full h-screen" />
                        </div>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function showImagePopup(imageUrl) {
        var popup = document.getElementById('image-popup');
        var image = popup.querySelector('img');

        image.src = imageUrl;

        popup.style.display = 'block';
    }

    function hideImagePopup() {
        var popup = document.getElementById('image-popup');

        popup.style.display = 'none';
    }
</script>
