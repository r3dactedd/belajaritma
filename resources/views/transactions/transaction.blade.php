<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="pb-12 bg-gray-200">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <div class="px-5 bg-white scroll-smooth sm:px-10">
            <div class="container flex flex-col items-start justify-between py-6 mx-auto md:flex-row md:items-center">
                <div>

                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a href="/certifications/{{ $data->id }}" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Registrasi Sertifikasi</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container p-6 mx-auto my-auto md:w-5/12">

            <div class="col-span-1 lg:col-span-6">

                <div class="p-8 bg-white shadow-md rounded-xl">
                    <h1
                        class="mb-4 text-lg font-bold tracking-normal text-center text-gray-800 md:py-2 md:pr-4 md:text-left lg:text-2xl">
                        {{ $data->certif_title }}
                    </h1>
                    <div class="mb-6 text-left">
                        <div class="text-lg font-semibold text-left">Biaya Sertifikasi</div>
                        <span class="text-lg font-bold text-indigo-500">Rp.
                            {{ number_format($data->certif_cost, 2, ',', '.') }}</span>
                    </div>

                    <div class="mb-6">
                        <label class="my-4 font-semibold" for="">Tahap Transaksi</label>

                        <div class="p-4 my-4 bg-white border border-gray-600 rounded-lg shadow-md">
                            <div class="my-1 text-base font-medium">Anda dapat melakukan transfer pada nomor <span
                                    class="font-semibold text-indigo-600">12345678 A.N Lorem Ipsum</span></div>
                            <div class="my-1 text-base font-medium">1. Cantumkan screenshot bukti transfer pada link upload
                                dibawah ini.</div>
                            <div class="my-1 text-base font-medium">2. Screenshot bukti yang valid terdiri dari pesan
                                berhasil, tanggal dan waktu transfer, nama penerima diatas, serta nominal transaksi yang
                                sesuai.</div>
                            <div class="my-1 text-base font-medium">3. Anda dapat melihat status pembayaran pada menu Profil
                                Saya -> Riwayat Transaksi</div>
                            <div class="my-1 text-base font-medium">4. Apabila bukti transfer valid, anda sudah dapat
                                mengakses tes sertifikasi.</div>
                            <div class="my-1 text-base font-medium">5. Apabila bukti transfer tidak valid, anda dapat
                                mengupload ulang bukti transfer anda.</div>
                        </div>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label class="my-4 font-semibold" for="">Upload Bukti Pembayaran</label>

                            <img id="img-preview-transaction"
                                class="mb-2 max-w-full h-auto rounded-lg border border-gray-300"
                                style="max-width: 150px; max-height: 150px;" onclick="showImagePopupTransaction()">
                            <input name="transaction_proof" id="inputImageTransaction"
                                class="my-4 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm focus:outline-none"
                                type="file" accept="image/*" onchange=previewImageTransaction()>

                            <input type="hidden" id="certifId" name="certif_id" value="{{ $data->id }}">
                        </div>

                        <div>
                            <button type="submit" onclick="validateFile()"
                                class="w-full px-4 py-3 font-semibold text-white bg-blue-500 rounded-md shadow-md text-ceenter">
                                Kirim Bukti Pembayaran
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div id="image-popup-transaction"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full bg-gray-800 bg-opacity-75">
            <div class="absolute transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                <button type="button" onclick="hideImagePopupTransaction()"
                    class="absolute inline-flex items-center justify-center w-8 h-8 text-gray-600 bg-white rounded-full right-4 top-4 hover:bg-gray-300">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
                <img id="popup-image-transaction" class="max-w-full max-h-full" />
            </div>
        </div>

    </body>
    <script>
        function validateFile() {
            var fileInput = document.getElementById('transaction_proof').value;
            if (fileInput === '') {
                alert('Error: Bukti transaksi harus dikirim');
                return;
            } else {
                alert('Success: Bukti transaksi berhasil dikirim!');
            }
        }

        //Image Script for Transaction
        function showImagePopupTransaction() {
            var popup = document.getElementById('image-popup-transaction');
            var image = popup.querySelector('img');

            var inputImage = document.getElementById('inputImageTransaction');
            var imageUrl = inputImage.files.length > 0 ? URL.createObjectURL(inputImage.files[0]) : '';

            image.src = imageUrl;

            popup.style.display = 'block';
        }

        function hideImagePopupTransaction() {
            var popup = document.getElementById('image-popup-transaction');

            popup.style.display = 'none';
        }


        function previewImageTransaction() {
            var inputImage = document.getElementById('inputImageTransaction');
            var imgPreview = document.getElementById('img-preview-transaction');

            if (inputImage.files.length > 0) {
                var imageUrl = URL.createObjectURL(inputImage.files[0]);
                imgPreview.src = imageUrl;
                imgPreview.style.display = 'block';
            }
        }
    </script>

@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
