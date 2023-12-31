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
                            <span class="mb-1 ml-2">Final Test (or Certification Test)</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-4 p-4">
            <div class="no-wrap my-4 md:-mx-2 md:flex">

                {{-- QUESTION  --}}
                <div id="asg-top" class="my-4"></div>

                <div class="w-2xl mx-4 h-fit rounded-xl bg-white md:mx-12">
                    <div class="mx-auto p-6 antialiased">
                        <div class="space-y-4">
                            <h1
                                class="relative mx-6 block w-auto py-4 text-lg font-bold tracking-normal text-gray-800 lg:text-xl">
                                Mengenai Test
                            </h1>
                            <h2
                                class="relative mx-6 mb-2 w-auto text-base font-semibold tracking-normal text-gray-800 lg:text-base">
                                Input Deskripsi Assignment here "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor
                                incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation
                                ullamco
                            </h2>

                            <div class="grid w-full grid-cols-1 gap-4 pl-4 pr-8 font-semibold md:w-6/12 md:grid-cols-2">
                                <div class="rounded-lg bg-white p-4">
                                    <div class="text-indigo-500">Waktu Pengerjaan</div>
                                    <div class="text-xs text-gray-500">60 Menit</div>
                                </div>
                                <div class="rounded-lg bg-white p-4">
                                    <div class="text-indigo-500">Nilai Minimum</div>
                                    <div class="text-xs text-gray-500">min. 75</div>
                                </div>
                            </div>


                        </div>
                        <a href='/courses/3/asg/questions'
                            class="y-4 mx-auto mt-4 flex w-full items-center justify-center rounded-md bg-indigo-500 px-2 py-4 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:w-4/12">

                            <span class="mx-2 items-center">Mulai Test
                            </span>

                        </a>
                    </div>


                </div>
            </div>

    </body>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
