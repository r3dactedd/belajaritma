<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 pb-12">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <div class="scroll-smooth bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>

                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Verifikasi Pembayaran Sertifikasi</span>
                        </a>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-4 pb-4">


            <div class="container mx-auto w-11/12 overflow-x-auto">

                <table class="mx-auto w-full text-xs text-white">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead class="bg-gray-200 leading-normal text-gray-600">
                        <tr class="text-md bg-gray-200 leading-normal text-gray-600 md:text-lg">
                            <th class="px-4 py-2 text-left">Nama User</th>
                            <th class="px-4 py-2 text-left">Sertifikasi</th>
                            <th class="px-4 py-2 text-left">Kode Pembayaran</th>
                            <th class="px-4 py-2 text-left">Tanggal Upload Bukti</th>
                            <th class="px-2 py-3 text-center">Foto Bukti</th>
                            <th class="px-2 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-md font-light text-gray-600 md:text-lg">
                        @foreach ($data as $transaction)
                            <tr class="border-b border-opacity-20 bg-white font-medium leading-normal text-gray-600">
                                <td class="px-4 py-2">
                                    <p class="max-h-20 overflow-scroll">{{ $transaction->transactionToUser->username }}</p>
                                </td>
                                <td class="px-4 py-2">
                                    <p class="max-h-20 overflow-scroll">
                                        {{ $transaction->transactionToCertification->certif_title }}
                                    </p>
                                </td>
                                <td class="px-4 py-2">
                                    <p class="max-h-20 overflow-scroll">{{ $transaction->payment_code }}</p>
                                </td>
                                <td class="px-4 py-2">
                                    <p class="max-h-20 overflow-scroll">{{ $transaction->created_at->format('Y-m-d') }}</p>
                                </td>
                                <td class="px-6 py-3 text-center">
                                    <div class="item-center flex justify-center">
                                        {{-- Image here --}}
                                        <a href="#" class="mr-2 w-4 transform hover:scale-110 hover:text-green-500"
                                            onclick="showImagePopup('{{ $transaction->transaction_proof }}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18"
                                                viewBox="0 0 576 512">
                                                <path
                                                    d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-center">
                                    <div class="item-center flex justify-center">
                                        {{-- Yes --}}
                                        <a href="#" class="mx-2 w-4 transform hover:scale-110 hover:fill-green-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                            </svg>

                                        </a>
                                        {{-- No --}}
                                        <a href="#" class="mr-2 w-4 transform hover:scale-110 hover:fill-red-500"
                                            data-modal-target="popup-delete" data-modal-toggle="popup-delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                                viewBox="0 0 384 512">
                                                <path
                                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="image-popup"
                    class="fixed left-0 right-0 top-0 z-50 hidden h-full w-full bg-gray-800 bg-opacity-75">
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <button type="button" onclick="hideImagePopup()"
                            class="absolute right-4 top-4 inline-flex h-8 w-8 items-center justify-center rounded-full bg-white text-gray-600 hover:bg-gray-300">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <img src="{{ $transaction->transaction_proof }}" alt="Transaction Proof"
                            class="max-w-full max-h-full" />
                    </div>
                </div>
            </div>
        </div>
    </body>
    {{-- Delete Popup Modal --}}
    <div id="popup-delete" tabindex="-1"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
        <div class="relative max-h-full w-full max-w-md">
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-delete">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin menghapus
                        Sertifikasi tersebut?
                    </h3>
                    <div class="flex justify-center text-center">
                        {{-- <form method="POST" action="/manager/course/delete/{{ $data->id }}" data-course-id=""> --}}
                        <form method="POST" action="#" data-course-id="">
                            @csrf
                            @method('DELETE')
                            <button data-modal-hide="popup-delete" type="submit"
                                class="mr-2 items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                Ya, hapus
                            </button>
                        </form>
                        <button data-modal-hide="popup-delete" type="button"
                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-indigo-400 hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200">Tidak,
                            batalkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Popup Modal --}}
@endsection
@section('footer')
    @include('layout.footer')
@endsection
<script>
    function showImagePopup(imageUrl) {
        var popup = document.getElementById('image-popup');

        var image = popup.querySelector('img');
        image.src = imageUrl;

        // Show the popup
        popup.style.display = 'block';
    }

    function hideImagePopup() {
        var popup = document.getElementById('image-popup');

        popup.style.display = 'none';
    }
</script>

</html>
