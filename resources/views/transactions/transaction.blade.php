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
                            <span class="mb-1 ml-2">Transaksi Pembayaran</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto p-6 md:w-5/12">

            <div class="col-span-1 lg:col-span-6">

                <div class="rounded-xl bg-white p-8 shadow-md">
                    <h1
                        class="mb-4 text-center text-lg font-bold tracking-normal text-gray-800 md:py-2 md:pr-4 md:text-left lg:text-2xl">
                        Nama Sertificate here
                    </h1>
                    <div class="mb-6 text-left">
                        <div class="text-left text-lg font-semibold">Biaya Sertifikasi </div>
                        <span class="text-lg font-bold text-indigo-500">Rp. 199.999,00</span>
                    </div>
                    <div class="mb-6">
                        <label class="mb-3 block" for="">Nama di Kartu</label>
                        <input type="text"
                            class="inline-block w-full rounded-md border border-gray-500 px-3 py-2 tracking-wider text-gray-600" />
                    </div>
                    <div class="mb-6">
                        <label class="mb-3 block" for="">Nomor Kartu</label>
                        <input type="tel"
                            class="inline-block w-full rounded-md border border-gray-500 px-3 py-2 tracking-wide text-gray-600" />
                    </div>
                    {{-- <div class="mb-6 flex w-full flex-wrap">
                        <div class="mb-6 pr-3 md:w-2/3">
                            <label class="mb-3 block text-gray-600" for="">Tanggal Expire</label>
                            <div class="relative max-w-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>

                                <input datepicker type="text" datepicker-format="dd/yyyy"
                                    class="data-te-format= block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>

                        <div class="pr-3 md:w-1/3">
                            <label class="mb-3 block text-gray-600" for="">CVC (3 digit belakang)</label>
                            <input type="tel"
                                class="inline-block w-full rounded-md border border-gray-500 px-3 py-2 tracking-widest text-gray-600" />
                        </div>
                    </div> --}}
                    <div class="mb-6">
                        <label class="mb-3 block" for="">Pesan Transaksi (opsional)</label>
                        <textarea id="myInfo"
                            class="inline-block w-full rounded-md border border-gray-500 px-3 py-2 tracking-wide text-gray-600" placeholder=""
                            required=""></textarea>
                    </div>

                    <div>
                        <button
                            class="text-ceenter w-full rounded-md bg-blue-500 px-4 py-3 font-semibold text-white shadow-md">
                            Konfirmasi Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </body>


@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
