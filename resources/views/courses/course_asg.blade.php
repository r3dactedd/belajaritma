<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instructors</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />

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
                        <a class="flex items-center" href="/home">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Sesi x : Nama Materi </span>
                        </a>
                </div>

                <div class="mt-6 md:mt-0">
                    <button
                        class="flex items-center rounded-xl bg-teal-400 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        <div class="mx-2"> Tambah Materi </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-5 p-5">
            <div class="no-wrap my-4 md:-mx-2 md:flex">
                <div class="w-full md:mx-2 md:w-2/12">
                    <!-- Sidebar, pass value courselistnya aja-->
                    @include('courses.course_sidebar')
                </div>
                <div class="my-4"></div>
                <div class="w-2xl mx-12 bg-white md:w-10/12">
                    <h1
                        class="relative mx-6 mb-6 block w-auto pt-6 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                        1. PARAGRAPH "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum."
                    </h1>

                    <div class="pl-12">

                        <div class="mb-4 mr-4 flex items-center">
                            <input id="radio1" type="radio" name="radio" class="hidden" checked />
                            <label for="radio1" class="flex cursor-pointer items-center text-xl">
                                <span
                                    class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                Best choice</label>
                        </div>

                        <div class="mb-4 mr-4 flex items-center">
                            <input id="radio2" type="radio" name="radio" class="hidden" />
                            <label for="radio2" class="flex cursor-pointer items-center text-xl">
                                <span
                                    class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                Second choice</label>
                        </div>

                        <div class="mb-4 mr-4 flex items-center">
                            <input id="radio3" type="radio" name="radio" class="hidden" />
                            <label for="radio3" class="flex cursor-pointer items-center text-xl">
                                <span
                                    class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                Third choice</label>
                        </div>

                        <div class="mb-4 mr-4 flex items-center">
                            <input id="radio4" type="radio" name="radio" class="hidden" />
                            <label for="radio4" class="flex cursor-pointer items-center text-xl">
                                <span
                                    class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                Fourth choice</label>
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
