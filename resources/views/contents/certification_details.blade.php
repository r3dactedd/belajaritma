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
                            <span class="mb-1 ml-2">Detail Sertifikasi</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto p-6 md:w-8/12">

            <div class="my-4 rounded-xl bg-white md:flex">
                <!-- Left Side -->
                <div class="w-full md:w-1/3">
                    <!-- Profile Card -->
                    <div class="h-full p-2 md:py-4 md:pl-8">
                        <div class="mx-auto h-full w-full">
                            <img class="max-h-64 w-full p-4 md:px-0"
                                src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                alt="e" />
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="h-auto w-full md:mx-2 md:w-2/3">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="rounded-xl bg-white px-6 py-2 md:px-12">
                        <h1
                            class="py-2 text-center text-xl font-bold tracking-normal text-gray-800 md:py-6 md:pr-4 md:text-left lg:text-3xl">
                            Security, Compliance, and Identity Fundamentals
                        </h1>
                        <p class="text-md mb-6 font-normal tracking-normal text-gray-600">
                            Certi Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                        </p>
                        <div class="grid-row-2 grid md:grid-cols-2">
                            <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                <div
                                    class="mb-3 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">Sertifikasi</span>
                                </div>

                                <div
                                    class="mb-3 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">123 Siswa</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4"></div>
            <div class="mx-auto my-auto md:-mx-2 md:flex">
                <div class="h-auto w-full md:mx-2">
                    <div class="rounded-t-xl bg-white p-4 shadow-sm">
                        <div class="mb-3 ml-2 flex items-center space-x-2 font-semibold leading-8 text-gray-900">

                            <span class="px-2 text-xl tracking-wide">Mengenai Sertifikasi</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="flex text-sm">
                                <div class="block">
                                    <div class="px-4 py-2 font-semibold">
                                        <p>Whether you're a student, business user, or IT professional, this certification
                                            ensures you have a firm grasp of a range of topicsin the rapidly growing field
                                            of cybersecurity. This fundamentals certification can serve as a stepping stone
                                            if you're interested in advancing to role-based certifications in security
                                            operations, identity and access management, and information
                                            protection.<br><br>The Microsoft Certified: Security,Compliance, and Identity
                                            Fundamentals certification could be a great fit for you if you'd like
                                            to:<br><br>- Demonstrate your knowledge of Microsoft Security, compliance, and
                                            identity (SCI) solutions.<br>- Highlight your understanding of how Microsoft SCI
                                            solutions provide holistic,end-to-end cybersecurity capabilities.</p>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="rounded-b-xl bg-white p-4 shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div>
                                <div class="mb-3 ml-2 flex items-center space-x-2 font-semibold leading-8 text-gray-900">

                                    <span class="px-2 text-xl tracking-wide">Informasi Test</span>
                                </div>

                                <div class="grid grid-cols-1 gap-4 py-4 pl-4 pr-8 font-semibold md:grid-cols-3">
                                    <div class="rounded-lg bg-white p-4 shadow-md">
                                        <div class="text-indigo-500">Waktu Test</div>
                                        <div class="text-xs text-gray-500">120 menit</div>
                                    </div>
                                    <div class="rounded-lg bg-white p-4 shadow-md">
                                        <div class="text-indigo-500">Jumlah Pertanyaan</div>
                                        <div class="text-xs text-gray-500">50 Pilihan Ganda</div>
                                    </div>
                                    <div class="rounded-lg bg-white p-4 shadow-md">
                                        <div class="text-indigo-500">Biaya Sertifikasi</div>
                                        <div class="text-xs text-gray-500">Rp 250.000,00</div>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <div
                                    class="mb-3 ml-2 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">

                                    <span class="px-2 text-xl tracking-wide">Outline Test</span>
                                </div>
                                <div class="px-4 py-2 text-sm font-semibold text-gray-700">
                                    <p>Berikut merupakan outline materi yang dalam test sertifikasi ini :
                                        <br><br>1. HLorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed
                                        do<br>2. HLorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed
                                        do<br>3. HLorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed
                                        do<br>4. HLorem ipsum dolor sit amet, consectetur adipiscing elit,
                                        sed
                                        do
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-4"></div>
            <div class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            Registrasi Sertifikasi (muncul kalau belum registered)
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            Anda belum melakukan registrasi untuk sertifikasi ini. Untuk mengakses tes sertifikasi,
                            selesaikan
                            pembayaran terlebih dahulu.
                        </p>

                        <div class="flex items-center">
                            <div class="flex items-center">

                                <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                    <a href="/transaction" id="convertButton"
                                        class="bg-selected inline-block rounded-3xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Registrasi</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            Ambil Test Sertifikasi (muncul kalau sudah registered)
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            Anda telah berhasil registrasi untuk sertifikasi ini. Silahkan memulai test ini.
                        </p>

                        <div class="flex items-center">
                            <div class="flex items-center">

                                <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                    <a href="/test" id="convertButton"
                                        class="bg-selected inline-block rounded-3xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Ambil
                                        Test</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            Bukti Penyelesaian Sertifikasi (MUNCULIN ABIS SELESAI FINAL TEST)
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            Selamat! Anda telah menyelesaikan kursus ini. Silahkan mengunduh sertifikat anda.
                        </p>

                        <div class="flex items-center">
                            <div class="flex items-center">

                                <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                    <a id="convertButton"
                                        class="bg-selected inline-block rounded-3xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Unduh
                                        Sertifikat</a>
                                </p>
                            </div>
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
