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

</head>

<body class="bg-gray-200 pb-12">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <div class="bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>

                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Certifications </span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-4 pb-4">
            {{-- Search Bar --}}
            <form>
                <label for="default-search"
                    class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Cari Sertifikasi Yang Ingin Diambil" required>
                </div>
            </form>
            {{-- Search Bar --}}
            {{-- Certi Component --}}
            <div
                class="container mx-auto mb-10 mt-10 flex w-11/12 flex-col-reverse rounded-xl border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg lg:flex-row">
                <a href="/certifications/1">
                    <div class="w-full lg:w-2/3">
                        <div class="px-8 py-4">
                            <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                <h2 class="my-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                    Certification Name
                                </h2>
                            </div>
                            <p class="text-md mb-6 font-normal tracking-normal text-gray-600 md:w-3/4">
                                Certi Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 items-start px-8 pb-6 md:flex md:flex-col lg:flex-row lg:items-center">

                            <div class="flex items-center">
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
                </a>
                <div
                    class="flex flex-row items-center justify-between border-t border-gray-300 px-5 py-3 md:px-10 lg:px-5 lg:py-4">

                    <div class="flex items-center">
                        <p class="w-fit rounded-xl bg-green-400 px-6 py-1.5 text-sm text-white">
                            Selesai
                        </p>
                    </div>
                </div>
            </div>
            <div class="relative inline-block max-h-64 w-full rounded-t lg:h-auto lg:w-1/3 lg:rounded-r lg:rounded-t-none">
                <img class="absolute inset-0 h-full w-full rounded-t object-cover lg:rounded-r lg:rounded-t-none"
                    src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_43.png" alt="banner" />
            </div>
        </div>
        {{-- Certi Component --}}
        <div
            class="container mx-auto mb-10 mt-10 flex w-11/12 flex-col-reverse rounded-xl border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg lg:flex-row">
            <a href="/certifications/1">
                <div class="w-full lg:w-2/3">
                    <div class="px-4 py-6 lg:px-6">
                        <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                            <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                Certification Name
                            </h2>
                        </div>
                        <p class="text-md mb-6 font-normal tracking-normal text-gray-600 md:w-3/4">
                            Certi Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
                        </p>
                    </div>
            </a>
            <div
                class="flex flex-row items-center justify-between border-t border-gray-300 px-5 py-3 md:px-10 lg:px-5 lg:py-4">

                <div class="flex items-center">
                    <p class="w-fit rounded-xl bg-green-400 px-6 py-1.5 text-sm text-white">
                        Selesai
                    </p>
                </div>
            </div>
        </div>
        <div class="relative inline-block max-h-64 w-full rounded-t lg:h-auto lg:w-1/3 lg:rounded-r lg:rounded-t-none">
            <img class="absolute inset-0 h-full w-full rounded-t object-cover lg:rounded-r lg:rounded-t-none"
                src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_43.png" alt="banner" />
        </div>
        </div>


    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection

</body>


</html>
