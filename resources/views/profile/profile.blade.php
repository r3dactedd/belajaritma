<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
</head>

<body class="bg-gray-200 pb-12">
    @section('title', 'My Profile')
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
                            <span class="mb-1 ml-2">Profil Saya</span>
                        </a>
                </div>
            </div>
        </div>

        <div class="" style="background-image: url(/storage/image/bg2.svg)">
            <div class="container mx-auto p-5">
                <div class="my-4 px-4 md:flex">
                    <!-- Left Side -->
                    <div class="w-full md:w-3/12">
                        <!-- Profile Card -->

                        <div class="h-120 w-auto">
                            <img src="/storage/image/forumtest.png">
                        </div>

                    </div>
                    <div class="my-4"></div>
                    <!-- Right Side -->
                    <div class="h-full w-full md:w-9/12">

                        <div class="rounded-xl bg-none p-3 shadow-sm">
                            <div class="md:mx-2 md:w-3/4">
                                <div class="rounded-xl bg-none px-4 py-2 md:px-8">
                                    <h1
                                        class="pr-2 pt-2 text-center text-xl font-bold tracking-normal text-white md:pr-4 md:pt-8 md:text-left lg:text-3xl">
                                        Username
                                    </h1>
                                    <h2
                                        class="pr-2 pt-2 text-center text-lg tracking-normal text-white md:pr-4 md:pt-4 md:text-left lg:text-xl">
                                        Email@gmail.com
                                    </h2>

                                    <h2
                                        class="text-md mt-8 pr-2 pt-2 text-center tracking-normal text-white md:pr-4 md:text-left lg:text-lg">
                                        Tentang Saya
                                    </h2>

                                    <textarea disabled="myInfo"
                                        class="focus:ring-primary-600 focus:border-primary-600 text-md mt-4 block w-full resize-none rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900"
                                        placeholder="Silahkan isi informasi mengenai anda." required="">INSERT TENTANG SAYA THINGS HERE
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="my-4"></div>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection

</html>
