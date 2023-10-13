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
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 pb-12">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <div class="scroll-smooth bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>

                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Detail Sertifikasi</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto p-6 md:w-8/12">

            <div class="my-4 rounded-xl bg-white md:flex">
                <!-- Left Side -->
                <div class="w-full md:w-2/5">
                    <!-- Profile Card -->
                    <div class="h-full rounded-xl bg-white p-2 md:py-4 md:pl-8">
                        <div class="mx-auto h-full w-full">
                            <img class="max-h-72 w-full p-4 md:px-0"
                                src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                alt="e" />
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="h-auto w-full md:mx-2 md:w-3/5">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="rounded-xl bg-white px-6 py-2 md:px-12">
                        <h1
                            class="py-2 text-center text-xl font-bold tracking-normal text-gray-800 md:py-6 md:pr-4 md:text-left lg:text-3xl">
                            Algoritma dan Pemrograman
                        </h1>
                        <p class="text-md mb-6 font-normal tracking-normal text-gray-600">
                            Course Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
                        </p>
                        <div class="grid-row-2 grid md:grid-cols-2">
                            <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">Dasar</span>
                                </div>

                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">123 Siswa</span>
                                </div>
                            </div>
                            <div class="flex flex-row items-center justify-between md:ml-8 lg:flex-col lg:items-start">
                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <a href="#syllabus"
                                        class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 align-middle text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-teal-800 focus:outline-none md:w-36">
                                        <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            height="1.1em" viewBox="0 0 576 512" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        Lihat Materi
                                    </a>
                                </div>
                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <a href="/transaction"
                                        class="inline-flex items-center rounded-md bg-green-400 px-4 py-2 align-middle text-sm font-semibold text-white hover:bg-indigo-600 md:w-36">
                                        <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            height="1.1em" viewBox="0 0 512 512">
                                            <path
                                                d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM294.6 135.1c-4.2-4.5-10.1-7.1-16.3-7.1C266 128 256 138 256 150.3V208H160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h96v57.7c0 12.3 10 22.3 22.3 22.3c6.2 0 12.1-2.6 16.3-7.1l99.9-107.1c3.5-3.8 5.5-8.7 5.5-13.8s-2-10.1-5.5-13.8L294.6 135.1z" />
                                        </svg>
                                        Registrasi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4"></div>
            <div class="mx-auto my-auto md:-mx-2 md:flex">
                <div class="h-auto w-full md:mx-2">
                    <div class="rounded-t-xl bg-white p-4 shadow-sm">
                        <div class="mb-3 ml-2 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                            <span class="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                </svg>
                            </span>
                            <span class="text-xl tracking-wide">Mengenai Sertifikasi</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="flex text-sm">
                                <div class="block">
                                    <div class="px-4 py-2 font-semibold">Whether you're a student, business user, or IT
                                        professional, this certification ensures you have a firm grasp of a range of topics
                                        in the rapidly growing field of cybersecurity. This fundamentals certification can
                                        serve as a steppingstone if you're interested in advancing to role-based
                                        certifications in security operations, identity and access management, and
                                        information protection.
                                    </div>
                                    <div class="text-md px-4 py-2 font-semibold"> The Microsoft Certified: Security,
                                        Compliance, and
                                        Identity Fundamentals certification could be a great fit for you if you'd like to:
                                        <h3>&#x2022 Demonstrate your knowledge of Microsoft Security, compliance, and
                                            identity (SCI)
                                            solutions.</h3>

                                        <h3>&#x2022; Highlight your understanding of how Microsoft SCI solutions provide
                                            holistic,
                                            end-to-end cybersecurity capabilities.</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-b-xl bg-white p-4 shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div>
                                <div class="mb-3 ml-2 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <span class="text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                        </svg>
                                    </span>
                                    <span class="text-xl tracking-wide">Informasi Test</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="text-in px-4 text-indigo-500">Waktu Test: </div>
                                        <div class="px-4 text-sm font-semibold text-gray-500">120 menit </div>

                                    </li>
                                    <li>
                                        <div class="px-4 text-indigo-500">Format Test</div>
                                        <div class="px-4 text-sm font-semibold text-gray-500">70 Pilihan Ganda</div>
                                    </li>
                                    <li>
                                        <div class="px-4 text-indigo-500">Biaya Registrasi</div>
                                        <div class="px-4 text-sm font-semibold text-gray-500">Rp 250.000,00 </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div
                                    class="mb-3 ml-2 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                                    </svg>
                                    <span class="text-xl tracking-wide">Program Lain yang Diperlukan</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="px-4 text-indigo-500">C Language Compiler (seperti DevC dan onlinegdb)
                                        </div>

                                    </li>
                                    <li>
                                        <div class="px-4 text-indigo-500">Web Browser (seperti Chrome atau Firefox)</div>

                                    </li>
                                </ul>
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
