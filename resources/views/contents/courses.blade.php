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
                        <a  class="flex items-center" href="#">
                            
                            <span class="mb-1 ml-2">Kursus</span>
                        </a>
                </div>
            </div>
        </div>
        <!-- page heading -->


        <div class="container mx-auto my-4 pb-4">
            {{-- Search Bar --}}
            <form action="/courses" method="get" class="px-4 lg:px-0">
                @csrf
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
                    <input type="search" name="searchKeyword" id="inputKeyword"
                        class="mt-10 block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Cari Kursus Yang Ingin Dipelajari" required>
                    <button type="submit"
                        class="absolute bottom-2.5 right-2.5 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            {{-- Search Bar --}}
            <div class="container mx-auto my-12 grid w-11/12 gap-8 pb-12 sm:grid-cols-1 md:grid-cols-2">
                {{-- Course Components --}}
                @foreach ($data as $course)
                    <a href="/courses/{{ $course->id }}">
                        <div
                            class="min-h-max cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                            <div class="lg:w-3/2 w-full">
                                <div class="p-6">
                                    <div class="my-2 bg-white md:flex md:h-36">
                                        <!-- Left Side -->
                                        <div class="w-full md:w-2/5">

                                            <div class="h-full bg-white py-2 md:ml-4">
                                                <div class="mx-auto h-full w-full">
                                                    <img class="max-h-36 w-full md:h-full"
                                                        src="{{ $course->course_img_url }}" alt="Course Image" />
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Side -->
                                        <div class="h-auto w-full md:mx-2 md:w-3/5">
                                            <div class="rounded-sm bg-white px-4 py-2">
                                                <h1 class="text-xl font-bold tracking-normal text-gray-800 lg:text-3xl">
                                                    {{ $course->course_name }}
                                                </h1>
                                                @if (auth()->check())
                                                    @if (auth()->user()->isEnrolled($course->id))
                                                        @if (auth()->user()->hasCompletedCourse($course->id))
                                                            <p
                                                                class="mt-4 w-fit rounded-xl bg-green-400 px-6 py-1.5 text-sm text-white">
                                                                Kursus Selesai
                                                            </p>
                                                        @else
                                                            <p
                                                                class="mt-4 w-fit rounded-xl bg-indigo-500 px-6 py-1.5 text-sm text-white">
                                                                Sedang Dipelajari
                                                            </p>
                                                        @endif
                                                    @else
                                                        <p
                                                            class="mt-4 w-fit rounded-xl bg-red-500 px-6 py-1.5 text-sm text-white">
                                                            Belum Diambil
                                                        </p>
                                                    @endif
                                                @else
                                                    <p
                                                        class="mt-4 w-fit rounded-xl bg-red-500 px-6 py-1.5 text-sm text-white">
                                                        Belum Diambil
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <p class="mb-6 h-16 w-11/12 px-4 text-base font-normal tracking-normal text-gray-600">
                                        {{ $course->short_desc }}
                                    </p>
                                    <div class="grid grid-cols-2 items-start px-4 py-6 md:flex md:grid-cols-4 md:flex-col lg:flex-row lg:items-center">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 384 512">
                                                <path
                                                    d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                            </svg>
                                            <p class="ml-2 text-sm font-normal text-gray-600">
                                                {{ $course->total_module }} Modul
                                            </p>
                                        </div>
                                        <div class="ml-0 flex items-end lg:ml-8 lg:mt-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                                <path
                                                    d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                            </svg>
                                            <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                                {{ $course->level }}
                                            </p>
                                        </div>
                                        <div class="ml-0 mt-4 flex items-end lg:ml-8 lg:mt-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512">
                                                <path
                                                    d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                            </svg>
                                            <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                                {{ $course->total_time }} Menit
                                            </p>
                                        </div>
                                        <div class="ml-0 mt-4 flex items-end lg:ml-8 lg:mt-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                                <path
                                                    d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                            </svg>
                                            <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                                {{ $course->students_enrolled }}
                                                Siswa
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endsection
        @section('footer')
            @include('layout.footer')
        @endsection
</body>

</html>
