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
                    <p class="flex items-center text-xs text-teal-400">
                        <span>Home</span>
                        <span class="mx-2">&gt;</span>
                        <span>Courses</span>
                    </p>
                    <h4 class="text-2xl font-bold leading-tight text-gray-800">
                        Courses
                    </h4>
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

        <div class="f-r-t container mx-auto mb-10 mt-10 flex rounded bg-white shadow lg:flex-row">
            <div class="flex flex-wrap justify-between lg:flex-nowrap">
                <div class="flex w-full flex-col gap-4 md:flex-col lg:flex-row">
                    <div class="block w-full">
                        <input placeholder="Search"
                            class="focus w-full rounded border border-gray-100 bg-gray-100 p-4 py-3 pr-10 leading-4 text-slate-600 outline-none" />
                        <svg class="pointer-events-none absolute right-5 top-3" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 17C13.866 17 17 13.866 17 10C17 6.13401 13.866 3 10 3C6.13401 3 3 6.13401 3 10C3 13.866 6.13401 17 10 17Z"
                                stroke="#4B5563" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21 21L15 15" stroke="#4B5563" stroke-width="1.66667" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <button
                        class="w-full rounded-[4px] bg-indigo-700 px-6 py-4 font-medium leading-[14px] text-white hover:bg-indigo-600 lg:max-w-[164px]">
                        Search
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
    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection

</body>


</html>
