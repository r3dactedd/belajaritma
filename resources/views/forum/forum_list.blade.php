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
                            
                            <span class="mb-1 ml-2">Akses Forum</span>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <!-- page heading -->

        <div class="container mx-auto my-4 pb-4">
            {{-- Search Bar --}}
            <form action="/forum" method="get" class="px-4 lg:px-0">
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
                        placeholder="Cari Kursus yang ingin Diakses">
                    <button type="submit"
                        class="absolute bottom-2.5 right-2.5 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
            {{-- Search Bar --}}
            <div class="container mx-auto my-12 grid w-11/12 gap-8 pb-12 sm:grid-cols-1 md:grid-cols-3">
                {{-- Course Components --}}
                @foreach ($data as $course)
                    <a href="forum/course/{{ $course->id }}">
                        <div
                            class="cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                            <div class="relative h-56 w-full">
                                <img class="absolute inset-0 z-0 h-full w-full rounded-t object-cover"
                                    src="{{ asset('uploads/course_images/' . $course->course_img) }}" alt="banner" />
                            </div>
                            <div class="h-full w-full pt-5 md:h-40">

                                <h4 class="mb-4 px-5 text-xl font-bold leading-5 tracking-normal text-gray-800 lg:text-2xl">
                                    {{ $course->course_name }}
                                </h4>
                                <p class="mb-6 px-5 text-base font-normal tracking-normal text-gray-600">
                                    {{ Str::limit(strip_tags($course->short_desc), 140) }}</p>
                                </p>
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
