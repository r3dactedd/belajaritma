<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
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
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Sesi x : Nama Materi </span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-4 p-4">
            <div class="no-wrap my-4 md:-mx-2 md:flex">
                <div class="w-full md:mx-2 md:w-3/12">
                    <!-- Sidebar, pass value courselistnya aja-->
                    @include('courses.course_sidebar')
                </div>
                {{-- QUESTION  --}}
                <div id="asg-top" class="my-4"></div>

                <div class="w-2xl mx-4 bg-white md:mx-12 md:w-9/12">
                    <div class="mx-auto p-6 antialiased">
                        <div class="space-y-4">
                            <h1
                                class="text-md relative mx-6 block w-auto py-4 font-bold tracking-normal text-gray-800 lg:text-xl">
                                Judul Assignment
                            </h1>
                            <h2 id="asgScore"
                                class="text-md lg:text-md relative mx-6 mb-6 hidden w-auto pt-6 font-semibold tracking-normal text-gray-800">
                                Nilai Assignment : <span class="text-indigo-600">90</span>
                            </h2>
                        </div>
                    </div>
                    <hr>
                    {{-- QUESTION TEXT --}}
                    <div class="mx-auto p-6 antialiased">
                        <div class="space-y-4">
                            <h1
                                class="text-md relative mx-6 mb-6 block w-auto pt-6 font-semibold tracking-normal text-gray-800 lg:text-xl">
                                1. TEXT QUESTION "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor
                                incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris
                                nisi ut aliquip ex ea commodo consequat.
                            </h1>

                            <div class="pl-12">

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio1-a" type="radio" name="radio1" class="hidden" />
                                    <label for="radio1-a" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Best choice</label>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio1-b" type="radio" name="radio1" class="hidden" />
                                    <label for="radio1-b" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Second choice</label>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio1-c" type="radio" name="radio1" class="hidden" />
                                    <label for="radio1-c" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Third choice</label>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio1-d" type="radio" name="radio1" class="hidden" />
                                    <label for="radio1-d" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Fourth choice</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- QUESTION RESULT INCORRECT --}}
                    <div class="mx-auto p-6 antialiased">
                        <div class="space-y-4">
                            <h1
                                class="text-md relative mx-6 mb-6 block w-auto pt-6 font-semibold tracking-normal text-gray-800 lg:text-xl">
                                2. INCORRECT EXAMPLE "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.
                            </h1>

                            <div class="pl-12">

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio2-a" type="radio" name="radio2" class="hidden" />
                                    <label for="radio2-a" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Wrong choice</label>
                                    {{-- ADD INI BUAT INCORRECT ANSWERS --}}
                                    <h1
                                        class="text-md relative mx-6 block w-auto font-semibold tracking-normal text-red-400 lg:text-xl">
                                        ✗
                                    </h1>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio2-b" type="radio" name="radio2" class="hidden" />
                                    <label for="radio2-b" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Second choice</label>
                                </div>
                                {{-- ADD INI BUAT YANG CORRECT ANSWER --}}
                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio2-c" type="radio" name="radio2" class="hidden" />
                                    <label for="radio2-c"
                                        class="text-md flex cursor-pointer items-center text-green-400 underline">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Give Correct choice kalau salah</label>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio2-d" type="radio" name="radio2" class="hidden" />
                                    <label for="radio2-d" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Fourth choice</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- QUESTION RESULT CORRECT --}}
                    <div class="mx-auto p-6 antialiased">
                        <div class="space-y-4">
                            <h1
                                class="text-md relative mx-6 mb-6 block w-auto pt-2 font-semibold tracking-normal text-gray-800 lg:text-xl">
                                3. CORRECT EXAMPLE "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor
                                incididunt ut
                                labore et dolore magna aliqua
                            </h1>

                            <div class="pl-12">

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio3-a" type="radio" name="radio3" class="hidden" />
                                    <label for="radio3-a" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Correct choice</label>
                                    {{-- ADD INI BUAT CORRECT ANSWERS --}}
                                    <h1
                                        class="text-md relative mx-6 block w-auto font-semibold tracking-normal text-green-400 lg:text-xl">
                                        ✓
                                    </h1>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio3-b" type="radio" name="radio3" class="hidden" />
                                    <label for="radio3-b" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Second choice</label>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio3-c" type="radio" name="radio3" class="hidden" />
                                    <label for="radio3-c" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Third choice</label>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio3-d" type="radio" name="radio3" class="hidden" />
                                    <label for="radio3-d" class="text-md flex cursor-pointer items-center">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        Fourth choice</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="mx-auto p-6 antialiased">
                        <div class="space-y-4">
                            <a href="#asg-top"
                                class="modal-open my-4 ml-4 flex w-fit items-center rounded-md bg-indigo-600 px-4 py-3 text-center text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                                Finish Assignment
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>

    </body>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
