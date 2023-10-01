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
                            <span class="mb-1 ml-2">Detail Kursus</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto w-full p-6 md:w-8/12">

            <div class="my-4 rounded-xl bg-white md:flex">
                <!-- Left Side -->
                <div class="w-full md:w-1/3">
                    <!-- Profile Card -->
                    <div class="h-full rounded-xl bg-white p-2 md:py-4 md:pl-8">
                        <div class="mx-auto h-full w-full">
                            <img class="h-full p-4 md:px-0"
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
                            {{$data->course_name}}
                        </h1>
                        <p class="text-md mb-6 font-normal tracking-normal text-gray-600">
                            {{$data->course_desc}}
                        </p>
                        <div class="grid-row-2 grid md:grid-cols-2">
                            <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">Pemula</span>
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
                                        class="inline-flex items-center rounded-md bg-indigo-500 px-4 py-2 align-middle text-sm font-semibold text-white hover:bg-indigo-600 md:w-36">
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
                                    <div class="px-4 py-2 font-semibold">{{$data->course_desc}}
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
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="px-4 text-teal-600">Resolusi Layar</div>
                                        <div class="px-4 text-xs text-gray-500">1366 x 768 (rec. 1920 x 1080) </div>
                                    </li>
                                    <li>
                                        <div class="px-4 text-teal-600">RAM</div>
                                        <div class="px-4 text-xs text-gray-500">1GB (rec. 2GB keatas)</div>
                                    </li>
                                    <li>
                                        <div class="px-4 text-teal-600">Processor</div>
                                        <div class="px-4 text-xs text-gray-500">Intel Celeron / Sekelas (rec. Intel i3 /
                                            Sekelas)</div>
                                    </li>

                                </ul>
                            </div>
                            <div>
                                <div
                                    class="mb-3 ml-2 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                                    </svg>
                                    <span class="text-xl tracking-wide">Tools yang Dibutuhkan</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="px-4 text-teal-600">C Language Compiler (seperti DevC dan onlinegdb)
                                        </div>
                                        <div class="px-4 text-xs text-gray-500">Diperlukan untuk menjalankan kode C</div>
                                    </li>
                                    <li>
                                        <div class="px-4 text-teal-600">Web Browser (seperti Chrome atau Firefox)</div>
                                        <div class="px-4 text-xs text-gray-500">Digunakan untuk mengakses materi</div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
            {{-- <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                <a href="/courses/1/getcerti"
                    class="bg-selected inline-block rounded-3xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Unduh
                    Sertifikat</a>
            </p>
            <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                <a href="/forum"
                    class="bg-selected inline-block rounded-3xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Forum</a>
            </p> --}}
            <h1 class="my-8 text-center text-3xl font-semibold">Materi Pembelajaran </h1>
            <div id="syllabus"class="my-4"></div>

            {{-- MATERI LIST START --}}
        @foreach ($material as $materialItem)
            <div class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">

                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <div class="flex items-center justify-between pt-4 lg:flex-col lg:items-start">
                            <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-indigo-600">
                                Sesi 1
                            </h4>
                        </div>

                        <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            {{$materialItem->material_title}}
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            {{$materialItem->material_desc}}
                        </p>

                        <div class="transition hover:bg-indigo-50">
                            <div class="accordion-header flex h-16 cursor-pointer items-center space-x-5 px-5 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                    <path
                                        d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                                </svg>
                                <h3 class="font-semibold">Konten Modul</h3>
                            </div>

                            <div class="accordion-content max-h-0 overflow-hidden px-5 pt-0">
                                <ul class="ml-8 list-inside space-y-2 pb-4">
                                    @foreach ($contentArray[$materialItem->id]  as $moduleContent)
                                    <li>
                                        <div class="flex items-center">
                                            @if ($moduleContent->is_completed == true)
                                                <!-- If done, add check-->
                                                <svg id="check" class="-ml-4" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                </svg>
                                                <a href="/courses/1/pdf" class="text-md ml-2 font-normal text-gray-600 hover:underline">
                                                     {{$moduleContent->content_title}}
                                                </a>
                                            @else
                                                <!-- If not done, add lock ini-->
                                                <div class="pointer-events-none flex items-center">
                                                    <!-- If not done, add lock ini-->
                                                    <svg id="lock" class="-ml-4" xmlns="http://www.w3.org/2000/svg"
                                                        height="1em" viewBox="0 0 448 512">
                                                        <path
                                                            d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                                                    </svg>

                                                    <a href="/courses/1/pdf"
                                                        class="text-md ml-2 font-normal text-gray-600 hover:underline">
                                                        {{$moduleContent->content_title}}
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

            <div class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <div class="flex items-center justify-between pt-4 lg:flex-col lg:items-start">
                            <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-indigo-600">
                                Final Session
                            </h4>
                        </div>

                        <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            Final Test
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            Memuat test akhir untuk kursus Algoritma dan Pemrograman
                        </p>

                        <div class="flex items-center">
                            <div class="flex items-center">

                                <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                    <a href="/courses/3/asg"
                                        class="bg-selected inline-block rounded-3xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Buka
                                        Test</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
    <style>
        .accordion-content {
            transition: max-height 0.3s ease-out, padding 0.3s ease;
        }
    </style>

    <script>
        const accordionHeader = document.querySelectorAll(".accordion-header");
        accordionHeader.forEach((header) => {
            header.addEventListener("click", function() {
                const accordionContent = header.parentElement.querySelector(".accordion-content");
                let accordionMaxHeight = accordionContent.style.maxHeight;

                // Condition handling
                if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
                    accordionContent.style.maxHeight = `${accordionContent.scrollHeight + 32}px`;
                    header.querySelector(".fas").classList.remove("fa-plus");
                    header.querySelector(".fas").classList.add("fa-minus");
                    header.parentElement.classList.add("bg-indigo-50");
                } else {
                    accordionContent.style.maxHeight = `0px`;
                    header.querySelector(".fas").classList.add("fa-plus");
                    header.querySelector(".fas").classList.remove("fa-minus");
                    header.parentElement.classList.remove("bg-indigo-50");
                }
            });
        });
    </script>

@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
