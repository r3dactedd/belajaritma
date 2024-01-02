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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
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
                            <span class="mb-1 ml-2">Registrasi Sertifikasi</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto p-6 md:w-5/12">

            <div class="col-span-1 lg:col-span-6">

                <div class="rounded-xl bg-white p-8 shadow-md">
                    <h1
                        class="mb-4 text-center text-lg font-bold tracking-normal text-gray-800 md:py-2 md:pr-4 md:text-left lg:text-2xl">
                        {{ $data->certif_title }}
                    </h1>
                    <div class="mb-6 text-left">
                        <div class="text-left text-lg font-semibold">Biaya Sertifikasi</div>
                        <span class="text-lg font-bold text-indigo-500">Rp. {{ $data->certif_cost }}</span>
                    </div>

                    <div class="mb-6">
                        <label class="my-4 font-semibold" for="">Tahap Transaksi</label>

                        <div class="my-4 rounded-lg border border-gray-600 bg-white p-4 shadow-md">
                            <div class="text-base my-1 font-medium">Anda dapat melakukan transfer pada nomor <span
                                    class="font-semibold text-indigo-600">12345678 A.N Lorem Ipsum</span></div>
                            <div class="text-base my-1 font-medium">1. Cantumkan screenshot bukti transfer pada link upload dibawah ini.</div>
                            <div class="text-base my-1 font-medium">2. Screenshot bukti yang valid terdiri dari pesan berhasil, tanggal dan waktu transfer, nama penerima diatas, serta nominal transaksi yang sesuai.</div>
                            <div class="text-base my-1 font-medium">3. Anda dapat melihat status pembayaran pada menu Profil Saya -> Riwayat Transaksi</div>
                            <div class="text-base my-1 font-medium">4. Apabila bukti transfer valid, anda sudah dapat mengakses tes sertifikasi.</div>
                            <div class="text-base my-1 font-medium">5. Apabila bukti transfer tidak valid, anda dapat mengupload ulang bukti transfer anda.</div>
                        </div>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label class="my-4 font-semibold" for="">Upload Bukti Pembayaran</label>

                            <input name="transaction_proof" id="transaction_proof"
                                class="my-4 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm focus:outline-none"
                                type="file" accept="image/*">
                            <input type="hidden" id="certifId" name="certif_id" value="{{ $data->id }}">
                        </div>

                        <div>
                            <button type="submit" onclick="validateFile()"
                                class="text-ceenter w-full rounded-md bg-blue-500 px-4 py-3 font-semibold text-white shadow-md">
                                Kirim Bukti Pembayaran
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </body>
    <script>
        function validateFile() {
            var fileInput = document.getElementById('transaction_proof').value;
            console.log("ini isian input gambar", fileInput)
            if (fileInput === '') {
                alert('Error: You must send the Transaction Proof!');
                return;
            } else {
                alert('Success: Transaction Proof has been successfully sent!');
            }
        }
    </script>

@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
