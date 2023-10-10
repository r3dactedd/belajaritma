<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="./style.css" rel="stylesheet" />
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let modal = document.getElementById("my-modal");
            let btn = document.getElementById("open-btn");
            let button = document.getElementById("ok-btn");

            btn.onclick = function() {
                modal.style.display = "block";
            }

            button.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
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
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Kursus</span>
                        </a>
                </div>
            </div>
        </div>
        <!-- page heading -->


        <div class="container mx-auto my-4 pb-4">
            {{-- Search Bar --}}
            <div class="relative m-4">
                <form>
                    <input type="text" placeholder="Cari Nama Kursus..." required=""
                        class="mt-5 w-full rounded-md border-transparent bg-gray-100 px-8 py-3 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                    <button type="submit"
                        class="absolute right-0 top-0 mt-4 rounded-r-lg border border-blue-700 bg-blue-700 p-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only font-semibold">Search</span>
                    </button>
                </form>
            </div>
            {{-- Search Bar --}}
            <div class="container mx-auto my-12 grid w-11/12 gap-8 pb-12 sm:grid-cols-1 md:grid-cols-2">
                {{-- Course Components --}}
                <a href="/courses/1">
                    <div
                        class="min-h-max cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="lg:w-3/2 w-full">
                            <div class="pb-4 pl-4 pr-4 pt-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                                <div class="my-2 bg-white md:flex md:h-36">
                                    <!-- Left Side -->
                                    <div class="w-full md:w-1/3">
                                        <!-- Profile Card -->
                                        <div class="h-full bg-white py-2">
                                            <div class="mx-auto h-full w-full">
                                                <img class="h-full"
                                                    src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                                    alt="e" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="h-auto w-full md:mx-2 md:w-2/3">
                                        <div class="bg-white px-4 py-2">
                                            <h1 class="text-xl font-bold tracking-normal text-gray-800 lg:text-3xl">
                                                Algoritma dan Pemrograman
                                            </h1>
                                            <p class="mt-4 w-fit rounded-xl bg-green-400 px-6 py-1.5 text-sm text-white">
                                                Kursus Selesai
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-md mb-6 w-11/12 px-4 font-normal tracking-normal text-gray-600">
                                    Course Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
                                </p>
                                <div
                                    class="grid grid-cols-2 items-start px-4 pb-6 md:flex md:flex-col lg:flex-row lg:items-center">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 384 512">
                                            <path
                                                d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                        </svg>
                                        <p class="ml-2 text-sm font-normal text-gray-600">
                                            xx Modul
                                        </p>
                                    </div>
                                    <div class="ml-0 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                            <path
                                                d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">Dasar
                                        </p>
                                    </div>
                                    <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512">
                                            <path
                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">12 Jam
                                        </p>
                                    </div>
                                    <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                            <path
                                                d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">120
                                            Siswa
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
                {{-- Course Components --}}

                <a href="/courses/4">
                    <div
                        class="min-h-max cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="lg:w-3/2 w-full">
                            <div class="pb-4 pl-4 pr-4 pt-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                                <div class="my-2 bg-white md:flex md:h-36">
                                    <!-- Left Side -->
                                    <div class="w-full md:w-1/3">
                                        <!-- Profile Card -->
                                        <div class="h-full bg-white py-2">
                                            <div class="mx-auto h-full w-full">
                                                <img class="h-full"
                                                    src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                                    alt="e" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="h-auto w-full md:mx-2 md:w-2/3">
                                        <div class="rounded-sm bg-white px-4 py-2">
                                            <h1 class="text-xl font-bold tracking-normal text-gray-800 lg:text-3xl">
                                                Data Structures
                                            </h1>
                                            <p class="mt-4 w-fit rounded-xl bg-yellow-500 px-6 py-1.5 text-sm text-white">
                                                Lanjut Kursus
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-md mb-6 w-11/12 px-4 font-normal tracking-normal text-gray-600">
                                    Course Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
                                </p>
                                <div
                                    class="grid grid-cols-2 items-start px-4 pb-6 md:flex md:flex-col lg:flex-row lg:items-center">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 384 512">
                                            <path
                                                d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                        </svg>
                                        <p class="ml-2 text-sm font-normal text-gray-600">
                                            xx Modul
                                        </p>
                                    </div>
                                    <div class="ml-0 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                            <path
                                                d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                            Menengah
                                        </p>
                                    </div>
                                    <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512">
                                            <path
                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                            12
                                            Jam
                                        </p>
                                    </div>
                                    <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                            <path
                                                d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                            120
                                            Siswa
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="/courses/4">
                    <div
                        class="cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="lg:w-3/2 w-full">
                            <div class="pb-4 pl-4 pr-4 pt-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                                <div class="my-2 bg-white md:flex md:h-36">
                                    <!-- Left Side -->
                                    <div class="w-full md:w-1/3">
                                        <!-- Profile Card -->
                                        <div class="h-full bg-white py-2">
                                            <div class="mx-auto h-full w-full">
                                                <img class="h-full"
                                                    src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                                    alt="e" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Right Side -->
                                    <div class="h-auto w-full md:mx-2 md:w-2/3">
                                        <div class="rounded-sm bg-white px-4 py-2">
                                            <h1 class="text-xl font-bold tracking-normal text-gray-800 lg:text-3xl">
                                                Artificial Intelligence
                                            </h1>
                                            <p class="mt-4 w-fit rounded-xl bg-indigo-500 px-6 py-1.5 text-sm text-white">
                                                Ambil Kursus
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-md mb-6 w-11/12 px-4 font-normal tracking-normal text-gray-600">
                                    Course Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
                                </p>
                                <div
                                    class="grid grid-cols-2 items-start px-4 pb-6 md:flex md:flex-col lg:flex-row lg:items-center">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 384 512">
                                            <path
                                                d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                        </svg>
                                        <p class="ml-2 text-sm font-normal text-gray-600">
                                            xx Modul
                                        </p>
                                    </div>
                                    <div class="ml-0 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                            <path
                                                d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                            Mahir
                                        </p>
                                    </div>
                                    <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512">
                                            <path
                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                            12
                                            Jam
                                        </p>
                                    </div>
                                    <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                            <path
                                                d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                            120
                                            Siswa
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
                <a href="/courses/1">
                    <div
                        class="min-h-max cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="lg:w-3/2 w-full">
                            <div class="pb-4 pl-4 pr-4 pt-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                                <div class="my-2 bg-white md:flex md:h-36">
                                    <!-- Left Side -->
                                    <div class="w-full md:w-1/3">
                                        <!-- Profile Card -->
                                        <div class="h-full bg-white py-2">
                                            <div class="mx-auto h-full w-full">
                                                <img class="h-full"
                                                    src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                                    alt="e" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="h-auto w-full md:mx-2 md:w-2/3">
                                        <div class="bg-white px-4 py-2">
                                            <h1 class="text-xl font-bold tracking-normal text-gray-800 lg:text-3xl">
                                                Course Name
                                            </h1>
                                            <p class="mt-4 w-fit rounded-xl bg-green-400 px-6 py-1.5 text-sm text-white">
                                                Course Status
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-md mb-6 w-11/12 px-4 font-normal tracking-normal text-gray-600">
                                    Course Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
                                </p>
                                <div
                                    class="grid grid-cols-2 items-start px-4 pb-6 md:flex md:flex-col lg:flex-row lg:items-center">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 384 512">
                                            <path
                                                d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                        </svg>
                                        <p class="ml-2 text-sm font-normal text-gray-600">
                                            [num] Modul
                                        </p>
                                    </div>
                                    <div class="ml-0 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                            <path
                                                d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">Dasar
                                        </p>
                                    </div>
                                    <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512">
                                            <path
                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                            yy Jam
                                        </p>
                                    </div>
                                    <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                            <path
                                                d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                            zz Siswa
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endsection
        @section('footer')
            @include('layout.footer')
        @endsection
</body>

</html>
