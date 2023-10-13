<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
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
                            <span class="mb-1 ml-2">Detail Kursus</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto w-full p-6 lg:w-9/12">
            <div class="my-4 rounded-xl bg-white md:flex">
                <!-- Left Side -->
                <div class="w-full md:w-2/5">
                    <!-- Profile Card -->
                    <div class="h-full rounded-xl bg-white p-2 md:py-4 md:pl-8">
                        <div class="mx-auto w-full">
                            <img class="max-h-72 p-4 md:px-0" src="/storage/image/courseimg.webp" alt="course image" />
                        </div>
                    </div>
                </div>

                <div class="h-auto w-full md:mx-2 md:w-3/5">
                    <div class="rounded-xl bg-white px-6 py-2 md:px-12">
                        <h1
                            class="py-2 text-center text-xl font-bold tracking-normal text-gray-800 md:py-6 md:pr-4 md:text-left lg:text-3xl">
                            Algoritma dan Pemrograman
                        </h1>
                        <p class="text-md mb-6 font-normal tracking-normal text-gray-600">
                            Course Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
                        </p>
                        <div class="grid-row-2 grid md:grid-cols-2">
                            <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">Dasar</span>
                                </div>

                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">123 Siswa</span>
                                </div>
                            </div>
                            <div class="flex flex-row items-center justify-between md:ml-8 lg:flex-col lg:items-start">
                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <a href="#syllabus"
                                        class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 align-middle text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-teal-800 focus:outline-none md:w-36">
                                        <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            height="1.1em" viewBox="0 0 576 512" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        Lihat Materi
                                    </a>
                                </div>
                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <a href="/courses/1/pdf"
                                        class="inline-flex items-center rounded-md bg-green-400 px-4 py-2 align-middle text-sm font-semibold text-white hover:bg-indigo-600 md:w-36">
                                        <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            height="1.1em" viewBox="0 0 512 512">
                                            <path
                                                d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM294.6 135.1c-4.2-4.5-10.1-7.1-16.3-7.1C266 128 256 138 256 150.3V208H160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h96v57.7c0 12.3 10 22.3 22.3 22.3c6.2 0 12.1-2.6 16.3-7.1l99.9-107.1c3.5-3.8 5.5-8.7 5.5-13.8s-2-10.1-5.5-13.8L294.6 135.1z" />
                                        </svg>
                                        Lanjut Kelas
                                    </a>
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
                            <span class="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                </svg>
                            </span>
                            <span class="text-xl tracking-wide">Mengenai Kursus</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="flex text-sm">
                                <div class="block">
                                    <div class="px-4 py-2 font-semibold">Kursus ini mengajarkan salah satu materi
                                        fundamental terpenting bagi Software Developer. Pembelajaran Algoritma dan
                                        Pemrograman ini akan menggunakan bahasa C, bahasa prosedural yang memiliki
                                        banyak
                                        kegunaan. Ia didesain untuk di-compile secara sederhana agar mendukung akses ke
                                        low-level memory, pendukung bahasa dalam instruksi mesin.
                                    </div>
                                    <div class="px-4 py-2 font-semibold">Kursus ini akan mengajarkan anda mengenai
                                        konsep
                                        dasar seperti Array and Strings, Control Flow, Function, Pointers, Contoh-contoh
                                        Algoritma, dan lain-lainnya. Kursus ini Cocok bagi Anda yang belum pernah
                                        belajar
                                        bahasa pemrograman apa pun, dan ingin mempelajari dasar-dasar sistem
                                        pemrograman.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-b-xl bg-white p-4 shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div>
                                <div class="mb-3 ml-2 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                        <path
                                            d="M384 96V320H64L64 96H384zM64 32C28.7 32 0 60.7 0 96V320c0 35.3 28.7 64 64 64H181.3l-10.7 32H96c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H277.3l-10.7-32H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm464 0c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H528zm16 64h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16s7.2-16 16-16zm-16 80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16zm32 160a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                    </svg>
                                    <span class="text-xl tracking-wide">Spesifikasi Minimum</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4 py-4 pl-4 pr-8">
                                    <div class="rounded-lg bg-white p-4 shadow-md">
                                        <div class="text-indigo-500">Resolusi Layar</div>
                                        <div class="text-xs text-gray-500">1366 x 768 (rec. 1920 x 1080)</div>
                                    </div>
                                    <div class="rounded-lg bg-white p-4 shadow-md">
                                        <div class="text-indigo-500">Minimum RAM</div>
                                        <div class="text-xs text-gray-500">1GB (rec. 2GB keatas)</div>
                                    </div>
                                    <div class="rounded-lg bg-white p-4 shadow-md">
                                        <div class="text-indigo-500">Processor</div>
                                        <div class="text-xs text-gray-500">Intel Celeron / Sekelas (rec. Intel i3 /
                                            Sekelas)</div>
                                    </div>
                                    <div class="rounded-lg bg-white p-4 shadow-md">
                                        <div class="text-indigo-500">Operating System</div>
                                        <div class="text-xs text-gray-500">Linux, MacOS, dan Windows</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="mb-3 ml-2 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                                    </svg>
                                    <span class="text-xl tracking-wide">Program Lain yang Diperlukan</span>
                                </div>
                                <div class="flex text-sm md:w-3/4">
                                    <div class="block">
                                        <div class="px-4 py-2 font-semibold">Untuk kursus ini diperlukan beberapa program
                                            seperti
                                            C Language Compiler (seperti DevC dan onlinegdb), Web Browser (seperti Chrome
                                            atau Firefox).
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 id="syllabus" class="my-8 text-center text-3xl font-semibold">Materi Pembelajaran </h1>
            <div class="my-4"></div>

            {{-- MATERI LIST START --}}
            <div class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <div class="flex items-center justify-between pt-4 lg:flex-col lg:items-start">
                            <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-indigo-600">
                                Sesi 1
                            </h4>
                        </div>

                        <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            Pengenalan Algoritma dan Pemrograman
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            We recommend this introduction as a starting point for how to move from face-to-face to
                            online
                            teaching. In this 60-minute webinar, we discuss how to effectively communicate with your
                            students &
                            the range of ways you can deliver content online.
                        </p>
                        <div
                            class="grid grid-cols-2 items-start pb-6 pr-4 md:flex md:flex-col lg:flex-row lg:items-center">
                            <div class="flex items-center">

                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">10 Menit
                                </p>
                            </div>
                            <div class="ml-0 flex items-end lg:ml-12 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                    <path
                                        d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                </svg>
                                <p class="ml-2 text-sm font-normal text-gray-600">
                                    PDF
                                </p>
                            </div>
                        </div>

                        <div class="transition hover:bg-indigo-50">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Module-->
            <div class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <div class="flex items-center justify-between pt-4 lg:flex-col lg:items-start">
                            <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-indigo-600">
                                Sesi 2
                            </h4>
                        </div>

                        <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            Membuat Program Sederhana di C
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            We recommend this introduction as a starting point for how to move from face-to-face to
                            online
                            teaching. In this 60-minute webinar, we discuss how to effectively communicate with your
                            students &
                            the range of ways you can deliver content online.
                        </p>
                        <div
                            class="grid grid-cols-2 items-start pb-6 pr-4 md:flex md:flex-col lg:flex-row lg:items-center">
                            <div class="flex items-center">

                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">45 Menit
                                </p>
                            </div>
                            <div class="ml-0 flex items-end lg:ml-12 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                    <path
                                        d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                                </svg>
                                <p class="ml-2 text-sm font-normal text-gray-600">
                                    Video
                                </p>
                            </div>
                        </div>
                        <div class="transition hover:bg-indigo-50">

                        </div>
                    </div>
                </div>
            </div>
            <div class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <div class="flex items-center justify-between pt-4 lg:flex-col lg:items-start">
                            <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-indigo-600">
                                Sesi 3
                            </h4>
                        </div>

                        <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            Assignment Review Materi 1
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            We recommend this introduction as a starting point for how to move from face-to-face to
                            online
                            teaching. In this 60-minute webinar, we discuss how to effectively communicate with your
                            students &
                            the range of ways you can deliver content online.
                        </p>
                        <div
                            class="grid grid-cols-2 items-start pb-6 pr-4 md:flex md:flex-col lg:flex-row lg:items-center">
                            <div class="flex items-center">

                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">15 Menit
                                </p>
                            </div>
                            <div class="ml-0 flex items-end lg:ml-12 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                </svg>
                                <p class="ml-2 text-sm font-normal text-gray-600">
                                    Assignment
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <div class="flex items-center justify-between pt-4 lg:flex-col lg:items-start">
                            <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-indigo-600">
                                Session 4
                            </h4>
                        </div>

                        <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            Final Test
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            Memuat test akhir untuk kursus Algoritma dan Pemrograman
                        </p>
                        <div
                            class="grid grid-cols-2 items-start pb-6 pr-4 md:flex md:flex-col lg:flex-row lg:items-center">
                            <div class="flex items-center">

                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">90 Menit
                                </p>
                            </div>
                            <div class="ml-0 flex items-end lg:ml-12 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                    <path
                                        d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                </svg>
                                <p class="ml-2 text-sm font-normal text-gray-600">
                                    50 Pertanyaan
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
                            Sertifikasi Penyelesaian Kursus (MUNCULIN ABIS SELESAI FINAL TEST)
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
    {{-- CERTIFICATION HERE --}}
    <style>
        .cert {
            border: 15px solid #0072c6;
            border-right: 15px solid #0894fb;
            border-left: 15px solid #0894fb;
            width: 700px;
            font-family: arial;
            color: #383737;
        }

        .crt_title {
            margin-top: 60px;
            font-size: 40px;
            letter-spacing: 1px;
            color: #0060a9;
        }

        .crt_logo img {
            width: 130px;
            height: auto;
            margin: auto;
            padding: 30px;
        }

        .colorGreen {
            color: #27ae60;
        }

        .crt_user {
            display: inline-block;
            width: 80%;
            padding: 5px 25px;
            margin-bottom: 0px;
            padding-bottom: 0px;

            font-size: 40px;
            border-bottom: 1px dashed #cecece;
        }

        .afterName {
            font-weight: 100;
            color: #383737;
        }

        .colorGrey {
            color: grey;
        }

        .certSign {
            width: 200px;
        }

        .marginBottom {
            margin-bottom: 80px;
        }

        @media (max-width: 700px) {
            .cert {
                width: 100%;
            }
        }
    </style>

    <table class="cert hidden bg-white">

        <tr>
            <td align="center">
                <h1 class="crt_title">Certificate Of Completion
                    <h2 class="afterName my-6 font-semibold">Sertifikat ini Diberikan Kepada</h2>
                    <h1 class="colorGreen crt_user">Insert Name Here</h1>
                    <h3 class="afterName mt-8">Dalam Menyelesaikan Kursus</h3>
                    <h2 class="afterName mt-4">Insert Course Name Here</h2>
                    <h3 class="mb-12 mt-4">Pada Tanggal <span class="font-semibold"> {{ date('Y-m-d') }}</span></h3>
            </td>
        </tr>
        <tr>
            <td align="center">
                <img class="mb-16" src="/storage/image/logo.png" alt="logo">

            </td>
        </tr>
    </table>

    <script>
        //Certification Upload to JPG
        document.getElementById("convertButton").addEventListener("click", function() {
            // Select the HTML element you want to convert to an image (your table)
            const elementToCapture = document.querySelector(".cert");
            elementToCapture.classList.remove("hidden")
            // Use html2canvas to capture the element as an image
            html2canvas(elementToCapture, {
                allowTaint: true,
                useCORS: true
            }).then(function(canvas) {
                // Create an image from the canvas
                const image = new Image();
                image.src = canvas.toDataURL("image/jpeg");

                // Create a download link for the image
                const a = document.createElement("a");
                a.href = image.src;
                a.download = "certificate.jpg";

                // Simulate a click on the download link to trigger the download
                a.click();

            });
            elementToCapture.classList.add("hidden")
        });
    </script>

@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
