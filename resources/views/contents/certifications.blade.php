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
                        <a  class="flex items-center" href="#">
                            
                            <span class="mb-1 ml-2">Sertifikasi</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-4 pb-4">
            {{-- Search Bar --}}
            <form action="/certifications" method="get" class="px-4 lg:px-0">
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
                        placeholder="Cari Nama Sertifikasi" required>
                    <button type="submit"
                        class="absolute bottom-2.5 right-2.5 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>

            <div class="container mx-auto my-12 grid w-11/12 grid-cols-1 gap-8 pb-12">
                @foreach ($data as $data)
                    <a href="/certifications/{{ $data->id }}">
                        <div
                            class="min-h-max cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                            <div class="lg:w-3/2 w-full">
                                <div class="p-6">
                                    <div class="my-2 bg-white md:flex">
                                        <!-- Left Side -->
                                        <div class="w-full md:w-1/3">
                                            <div class="h-full bg-white py-2 md:ml-4">
                                                <div class="mx-auto h-full w-full">
                                                    <img class="max-h-36 w-full md:max-h-48 md:w-4/5"
                                                        src="{{ asset('uploads/certif_images/' . $data->certif_img) }}"
                                                        alt="Certification Image" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Right Side -->
                                        <div class="h-auto w-full md:mx-2 md:w-2/3">
                                            <div class="px-4 md:px-8">
                                                <div
                                                    class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                                    <h2
                                                        class="text-xl font-bold tracking-normal text-gray-800 md:my-4 lg:text-2xl">
                                                        {{ $data->certif_title }}
                                                    </h2>
                                                </div>
                                                <h2 class="mb-4 text-lg font-bold tracking-normal text-gray-800">
                                                    Rp. {{ number_format($data->certif_cost, 2, ',', '.') }}
                                                </h2>
                                                <p
                                                    class="mb-2 text-base font-normal tracking-normal text-gray-600 md:w-3/4">
                                                    {{ $data->certif_short_desc }}
                                                </p>
                                                <div
                                                    class="mt-6 grid grid-cols-2 items-start md:flex md:flex-col lg:flex-row lg:items-center">

                                                    <div class="flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="20"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                                        </svg>
                                                        <p
                                                            class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                                            {{ $data->certif_duration }} Menit
                                                        </p>
                                                    </div>
                                                    <div class="ml-0 flex items-end lg:ml-12 lg:mt-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                            viewBox="0 0 384 512">
                                                            <path
                                                                d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                                        </svg>
                                                        <p
                                                            class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                                            {{ $data->total_questions }} Pertanyaan
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach()
            </div>
        </div>
    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection

</body>


</html>
