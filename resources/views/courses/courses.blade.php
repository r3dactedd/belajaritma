<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Courses</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="./style.css" rel="stylesheet" />
</head>

<body class="bg-gray-200 pb-12">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')

        <!-- page heading -->

        <div class="bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>

                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a class="flex items-center" href="/home">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Kursus</span>
                        </a>
                </div>

                <div class="mt-6 md:mt-0">
                    <button>
                        <div
                            class="flex items-center rounded bg-teal-400 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            <div class="mx-2"> Tambah Kursus </div>
                    </button>
                </div>
            </div>
        </div>


        <div
            class="container mx-auto my-12 grid w-11/12 gap-8 pb-12 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div>
                <a href="/courses/1">
                    <div
                        class="cursor-pointer items-stretch rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">

                        <div class="relative h-40 w-full">
                            <img class="absolute inset-0 z-0 h-full w-full rounded-t-xl object-cover"
                                src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_10.png"
                                alt="banner" />
                        </div>
                        <div class="h-full w-full pt-5">
                            {{-- MATERI TITLE, LIMIT 30 CHAR --}}
                            <h3 class="mb-4 px-5 text-lg font-bold leading-5 tracking-normal text-gray-800">
                                Algoritma dan Pemrograman
                            </h3>
                            {{-- MATERI DESC, LIMIT 100 CHAR --}}
                            <h4 class="text-md mb-6 h-16 px-5 font-semibold leading-5 tracking-normal text-gray-600">
                                Kursus ini mengajarkan salah satu materi fundamental terpenting bagi Software
                                Developer.
                            </h4>
                            {{-- JUMLAH MODULE --}}
                            <h4 class="text-md mb-6 px-5 font-semibold leading-5 tracking-normal">
                                6 Modul
                            </h4>
                            {{-- USE KALAU USER BELUM AMBIL COURSE --}}
                            <h4 class="text-md mb-6 px-5 font-semibold leading-5 tracking-normal text-red-600">
                                Belum Dimulai
                            </h4>
                            {{-- PROG BAR --}}
                            <div class="bg-grey-light mb-6 w-full px-5">
                                <div class="rounded-xl bg-blue-400 py-1 text-center text-xs leading-none text-white"
                                    style="width: 10%">0%
                                </div>
                            </div>
                </a>
            </div>
        </div>
        </div>

        {{-- USE KALAU USER ONGOING COURSE --}}
        <div>
            <a href="/courses/2">
                <div
                    class="cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">

                    <div class="relative h-40 w-full">
                        <img class="absolute inset-0 z-0 h-full w-full rounded-t-xl object-cover"
                            src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_10.png"
                            alt="banner" />
                    </div>

                    <div class="h-full w-full items-stretch pt-5">
                        {{-- MATERI TITLE, LIMIT 30 CHAR --}}
                        <h3 class="mb-4 px-5 text-lg font-bold leading-5 tracking-normal text-gray-800">
                            Data Structure
                        </h3>
                        {{-- MATERI DESC, LIMIT 100 CHAR --}}
                        <h4 class="text-md mb-6 h-16 px-5 font-semibold leading-5 tracking-normal text-gray-600">
                            Kursus ini mengajarkan Struktur Data, yaitu cara dan sistem menyimpan dan mengatur data di
                            komputer.
                        </h4>
                        {{-- JUMLAH MODULE --}}
                        <h4 class="text-md mb-6 px-5 font-semibold leading-5 tracking-normal">
                            10 Modul
                        </h4>
                        {{-- USE KALAU USER ONGOING COURSE --}}
                        <h4 class="text-md mb-6 px-5 font-semibold leading-5 tracking-normal text-yellow-400">
                            Sedang Mengerjakan
                        </h4>
                        {{-- PROG BAR --}}
                        <div class="bg-grey-light mb-6 w-full px-5">
                            <div class="rounded-xl bg-blue-400 py-1 text-center text-xs leading-none text-white"
                                style="width: 45%">45%
                            </div>
                        </div>

                    </div>
            </a>
        </div>
        </div>
        {{-- USE KALAU USER UDAH KELAR COURSE --}}
        <div>
            <a href="/courses/3">
                <div
                    class="cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">

                    <div class="relative h-40 w-full">
                        <img class="absolute inset-0 z-0 h-full w-full rounded-t-xl object-cover"
                            src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_10.png"
                            alt="banner" />
                    </div>
                    <a class="relative" href="/courses/3">
                        <div class="h-full w-full pt-5">
                            {{-- MATERI TITLE, LIMIT 30 CHAR --}}
                            <h3 class="mb-4 px-5 text-lg font-bold leading-5 tracking-normal text-gray-800">
                                Basic Web Programming
                            </h3>
                            {{-- MATERI DESC, LIMIT 100 CHAR --}}
                            <h4 class="text-md mb-6 h-16 px-5 font-semibold leading-5 tracking-normal text-gray-600">
                                Kursus ini mengajarkan basis Pemrograman Web, menggunakan HTML, CSS, dan Javascript.
                            </h4>
                            {{-- JUMLAH MODULE --}}
                            <h4 class="text-md mb-6 px-5 font-semibold leading-5 tracking-normal">
                                14 Modul
                            </h4>
                            {{-- USE KALAU USER UDAH KELAR COURSE --}}
                            <h4 class="text-md mb-6 px-5 font-semibold leading-5 tracking-normal text-green-600">
                                Selesai
                            </h4>
                            <div class="bg-grey-light mb-6 w-full px-5">
                                <div class="rounded-xl bg-blue-400 py-1 text-center text-xs leading-none text-white"
                                    style="width: 100%">100%
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
        </div>

        <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
            <a href="/courses/1/getcerti"
                class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Unduh
                Sertifikat</a>
        </p>
        <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
            <a href="/forum"
                class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Forum</a>
        </p>
    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection

</body>


</html>
