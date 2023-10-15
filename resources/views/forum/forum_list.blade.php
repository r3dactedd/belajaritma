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
                            <span class="mb-1 ml-2">Forum</span>
                        </a>
                </div>
            </div>
        </div>
        <!-- page heading -->


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
                        placeholder="Cari Kursus Yang Ingin Dipelajari" required>

                </div>
            </form>
            {{-- Search Bar --}}
            <div class="container mx-auto my-12 grid w-11/12 gap-8 pb-12 sm:grid-cols-1 md:grid-cols-2">
                {{-- Course Components --}}
                <a href="/courses/1">
                    <div
                        class="min-h-max cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="lg:w-3/2 w-full">
                            <div class="p-6">
                                <div class="my-2 bg-white md:flex md:h-36">
                                    <!-- Left Side -->
                                    <div class="w-full md:w-2/5">
                                        <!-- Profile Card -->
                                        <div class="ml-4 h-full bg-white py-2">
                                            <div class="mx-auto h-full w-full">
                                                <img class="h-full"
                                                    src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                                    alt="e" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="h-auto w-full md:mx-2 md:w-3/5">
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


                            </div>
                        </div>
                    </div>
                </a>
                {{-- Course Components --}}

                <a href="/courses/4">
                    <div
                        class="min-h-max cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="lg:w-3/2 w-full">
                            <div class="p-6">
                                <div class="my-2 bg-white md:flex md:h-36">
                                    <!-- Left Side -->
                                    <div class="w-full md:w-2/5">
                                        <!-- Profile Card -->
                                        <div class="ml-4 h-full bg-white py-2">
                                            <div class="mx-auto h-full w-full">
                                                <img class="h-full"
                                                    src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                                    alt="e" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="h-auto w-full md:mx-2 md:w-3/5">
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

                            </div>
                        </div>
                    </div>
                </a>
                <a href="/courses/4">
                    <div
                        class="cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="lg:w-3/2 w-full">
                            <div class="p-6">
                                <div class="my-2 bg-white md:flex md:h-36">
                                    <!-- Left Side -->
                                    <div class="ml-4 h-full bg-white py-2">
                                        <div class="mx-auto h-full w-full">
                                            <img class="h-full"
                                                src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                                alt="e" />
                                        </div>
                                    </div>
                                    <!-- Right Side -->
                                    <div class="h-auto w-full md:mx-2 md:w-3/5">
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


                            </div>
                        </div>
                    </div>
                </a>
                <a href="/courses/1">
                    <div
                        class="min-h-max cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="lg:w-3/2 w-full">
                            <div class="p-6">
                                <div class="my-2 bg-white md:flex md:h-36">
                                    <!-- Left Side -->
                                    <div class="ml-4 h-full bg-white py-2">
                                        <div class="mx-auto h-full w-full">
                                            <img class="h-full"
                                                src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                                alt="e" />
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="h-auto w-full md:mx-2 md:w-3/5">
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
