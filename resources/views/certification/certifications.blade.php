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

        {{-- Certi Component --}}
        <div
            class="container mx-auto mb-10 mt-10 flex w-11/12 flex-col-reverse rounded-xl border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg lg:flex-row">
            <a href="/certifications/1">
                <div class="w-full lg:w-2/3">
                    <div class="px-4 py-6 lg:px-6">
                        <div class="flex flex-row-reverse items-center justify-between lg:flex-col lg:items-start">
                            <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                Certification Name
                            </h2>
                        </div>
                        <p class="text-md mb-4 w-11/12 font-normal tracking-normal text-gray-600 lg:w-9/12">
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
        <div class="relative inline-block h-64 w-full rounded-t lg:h-auto lg:w-1/3 lg:rounded-r lg:rounded-t-none">
            <img class="absolute inset-0 h-full w-full rounded-t object-cover lg:rounded-r lg:rounded-t-none"
                src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_43.png" alt="banner" />
        </div>
        </div>
        {{-- Certi Component --}}

    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection

</body>


</html>
