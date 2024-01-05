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

<body class="pb-12 bg-gray-200">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <div class="px-5 bg-white sm:px-10">
            <div class="container flex flex-col items-start justify-between py-6 mx-auto md:flex-row md:items-center">
                <div>

                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Sesi {{ $currentMaterialIndex + 1 }} : Nama Materi </span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container p-4 mx-auto my-4">
            <div class="my-4 no-wrap md:-mx-2 md:flex">
                <div class="w-full md:mx-2 md:w-3/12">
                    <!-- Sidebar, pass value courselistnya aja-->
                    @include('contents.course_sidebar')
                </div>
                {{-- QUESTION  --}}
                <div id="asg-top" class="my-4"></div>

                <div class="mx-4 bg-white w-2xl border-xl md:mx-12 md:w-9/12">
                    <div class="p-6 mx-auto antialiased">
                        {{-- Success --}}
                        <div class="space-y-4">
                            <h1
                                class="relative block w-auto pt-4 mx-6 font-bold tracking-normal text-gray-800 text-md lg:text-xl">
                                Nilai Assignment : <span class="text-green-600">90</span>
                            </h1>
                            <h2
                                class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                Selamat, anda telah lulus kursus ini! Silahkan melanjutkan ke sesi berikutnya.
                            </h2>
                        </div>
                        {{-- Success --}}
                        {{-- Fail --}}
                        <div class="space-y-4">
                            <h1
                                class="relative block w-auto pt-4 mx-6 font-bold tracking-normal text-gray-800 text-md lg:text-xl">
                                Nilai Assignment : <span class="text-red-600">60</span>
                            </h1>
                            <h2
                                class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                Maaf, anda belum lulus kursus ini. Silahkan mengambil kembali assignment ini.
                            </h2>
                            <a href='/courses/3/asg/questions'
                                class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                <span class="items-center mx-2">Mengambil Ulang Assignment
                                </span>

                            </a>
                        </div>
                        {{-- Fail --}}
                    </div>
                    <hr>
                    {{-- QUESTION TEXT --}}
                    {{-- QUESTION RESULT INCORRECT --}}
                    <div class="p-6 mx-auto antialiased">
                        <div class="space-y-4">
                            <h1
                                class="relative block w-auto pt-6 mx-6 mb-6 font-semibold tracking-normal text-gray-800 text-md lg:text-xl">
                                2. INCORRECT EXAMPLE "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.
                            </h1>

                            <div class="pl-12">

                                <div class="flex items-center mb-4 mr-4">
                                    <input id="radio2-a" type="radio" name="radio2" class="hidden" />
                                    <label for="radio2-a" class="flex items-center cursor-pointer text-md">
                                        <span
                                            class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                        Wrong choice</label>
                                    {{-- ADD INI BUAT INCORRECT ANSWERS --}}
                                    <h1
                                        class="relative block w-auto mx-6 font-semibold tracking-normal text-red-400 text-md lg:text-xl">
                                        ✗
                                    </h1>
                                </div>

                                <div class="flex items-center mb-4 mr-4">
                                    <input id="radio2-b" type="radio" name="radio2" class="hidden" />
                                    <label for="radio2-b" class="flex items-center cursor-pointer text-md">
                                        <span
                                            class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                        Second choice</label>
                                </div>
                                {{-- ADD INI BUAT YANG CORRECT ANSWER --}}
                                <div class="flex items-center mb-4 mr-4">
                                    <input id="radio2-c" type="radio" name="radio2" class="hidden" />
                                    <label for="radio2-c"
                                        class="flex items-center text-green-400 underline cursor-pointer text-md">
                                        <span
                                            class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                        Give Correct choice kalau salah</label>
                                </div>

                                <div class="flex items-center mb-4 mr-4">
                                    <input id="radio2-d" type="radio" name="radio2" class="hidden" />
                                    <label for="radio2-d" class="flex items-center cursor-pointer text-md">
                                        <span
                                            class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                        Fourth choice</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{-- QUESTION RESULT CORRECT --}}
                    <div class="p-6 mx-auto antialiased">
                        <div class="space-y-4">
                            <h1
                                class="relative block w-auto pt-2 mx-6 mb-6 font-semibold tracking-normal text-gray-800 text-md lg:text-xl">
                                3. CORRECT EXAMPLE "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor
                                incididunt ut
                                labore et dolore magna aliqua
                            </h1>

                            <div class="pl-12">

                                <div class="flex items-center mb-4 mr-4">
                                    <input id="radio3-a" type="radio" name="radio3" class="hidden" />
                                    <label for="radio3-a" class="flex items-center cursor-pointer text-md">
                                        <span
                                            class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                        Correct choice</label>
                                    {{-- ADD INI BUAT CORRECT ANSWERS --}}
                                    <h1
                                        class="relative block w-auto mx-6 font-semibold tracking-normal text-green-400 text-md lg:text-xl">
                                        ✓
                                    </h1>
                                </div>

                                <div class="flex items-center mb-4 mr-4">
                                    <input id="radio3-b" type="radio" name="radio3" class="hidden" />
                                    <label for="radio3-b" class="flex items-center cursor-pointer text-md">
                                        <span
                                            class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                        Second choice</label>
                                </div>

                                <div class="flex items-center mb-4 mr-4">
                                    <input id="radio3-c" type="radio" name="radio3" class="hidden" />
                                    <label for="radio3-c" class="flex items-center cursor-pointer text-md">
                                        <span
                                            class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                        Third choice</label>
                                </div>

                                <div class="flex items-center mb-4 mr-4">
                                    <input id="radio3-d" type="radio" name="radio3" class="hidden" />
                                    <label for="radio3-d" class="flex items-center cursor-pointer text-md">
                                        <span
                                            class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                        Fourth choice</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="p-6 mx-auto antialiased">
                        <div class="space-y-4">
                            <a href="#asg-top"
                                class="flex items-center px-4 py-3 my-4 ml-4 text-sm font-semibold text-center text-white transition duration-150 ease-in-out bg-indigo-600 rounded-md modal-open w-fit hover:bg-yellow-500 focus:outline-none">
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
