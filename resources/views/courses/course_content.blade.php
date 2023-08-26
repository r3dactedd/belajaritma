<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instructors</title>
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
                        <a class="flex items-center" href="/home">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Detail Kursus</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto p-6 md:w-7/12">

            <div class="my-4 bg-white md:flex">
                <!-- Left Side -->
                <div class="w-full md:w-1/3">
                    <!-- Profile Card -->
                    <div class="h-full bg-white p-2 md:py-4 md:pl-8">
                        <div class="mx-auto h-full w-full">
                            <img class="h-full px-4 py-8 md:px-0"
                                src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                alt="e" />
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="h-auto w-full md:mx-2 md:w-2/3">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="rounded-sm bg-white px-6 py-2 md:px-12">
                        <h1
                            class="py-2 pr-2 text-center text-xl font-bold tracking-normal text-gray-800 md:py-8 md:pr-4 md:text-left lg:text-3xl">
                            {{$data->course_name}}
                        </h1>
                        <div class="grid-row-2 grid md:grid-cols-3">
                            <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">Pemula</span>
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
                                        class="inline-flex items-center rounded-md bg-teal-400 px-4 py-2 align-middle text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-teal-800 focus:outline-none md:w-36">
                                        <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            height="1.1em" viewBox="0 0 576 512" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        Lihat Materi
                                    </a>
                                </div>
                                <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <a href="/courses/1/pdf"
                                        class="inline-flex items-center rounded-md bg-indigo-500 px-4 py-2 align-middle text-sm font-semibold text-white hover:bg-indigo-600 md:w-36">
                                        <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            height="1.1em" viewBox="0 0 512 512">
                                            <path
                                                d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM294.6 135.1c-4.2-4.5-10.1-7.1-16.3-7.1C266 128 256 138 256 150.3V208H160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h96v57.7c0 12.3 10 22.3 22.3 22.3c6.2 0 12.1-2.6 16.3-7.1l99.9-107.1c3.5-3.8 5.5-8.7 5.5-13.8s-2-10.1-5.5-13.8L294.6 135.1z" />
                                        </svg>
                                        Lanjut Kelas
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
                    <div class="rounded-sm bg-white p-4 shadow-sm">
                        <div class="mb-3 ml-2 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                            <span class="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Mengenai Kursus</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="flex text-sm">
                                <div class="block">
                                    <div class="px-4 py-2 font-semibold">{{$data->course_desc}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-sm bg-white p-4 shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div>
                                <div class="mb-3 ml-2 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                        <path
                                            d="M384 96V320H64L64 96H384zM64 32C28.7 32 0 60.7 0 96V320c0 35.3 28.7 64 64 64H181.3l-10.7 32H96c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H277.3l-10.7-32H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm464 0c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H528zm16 64h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16s7.2-16 16-16zm-16 80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16zm32 160a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                    </svg>
                                    <span class="tracking-wide">Spesifikasi Minimum</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="px-4 text-teal-600">Resolusi Layar</div>
                                        <div class="px-4 text-xs text-gray-500">1366 x 768 (rec. 1920 x 1080) </div>
                                    </li>
                                    <li>
                                        <div class="px-4 text-teal-600">RAM</div>
                                        <div class="px-4 text-xs text-gray-500">1GB (rec. 2GB keatas)</div>
                                    </li>
                                    <li>
                                        <div class="px-4 text-teal-600">Processor</div>
                                        <div class="px-4 text-xs text-gray-500">Intel Celeron / Sekelas (rec. Intel i3 /
                                            Sekelas)</div>
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
                                    <span class="tracking-wide">Tools yang Dibutuhkan</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        <div class="px-4 text-teal-600">Owner at Her Company Inc.</div>
                                        <div class="px-4 text-xs text-gray-500">March 2020 - Now</div>
                                    </li>
                                    <li>
                                        <div class="px-4 text-teal-600">Owner at Her Company Inc.</div>
                                        <div class="px-4 text-xs text-gray-500">March 2020 - Now</div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
            <h1 class="my-8 text-center text-3xl font-semibold">Materi Pembelajaran </h1>
            <div id="syllabus"class="my-4"></div>
            <div class="container mx-auto mb-10 flex flex-col-reverse rounded bg-white shadow md:w-3/5 lg:flex-row">
                <a href="/courses/1/pdf">
                    <div class="w-full">
                        <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                            <div class="flex flex-row-reverse items-center justify-between lg:flex-col lg:items-start">
                                <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-teal-400">
                                    Sesi 1
                                </h4>
                            </div>
                            <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                Materi Name
                            </h2>
                            <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut
                                labore et dolore magna aliqua.
                            </p>
                            <p class="my-3 w-11/12 text-sm font-normal tracking-normal text-gray-600 lg:w-9/12">
                                <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H176c-35.3 0-64 28.7-64 64V512H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z" />
                                </svg>
                            </p>
                        </div>
                </a>
                <div
                    class="flex flex-row items-center justify-between border-t border-gray-300 px-5 py-3 md:px-10 lg:px-5 lg:py-4">
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
                                <a href="/courses/1/pdf"
                                    class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Buka
                                    Sesi</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto mb-10 flex flex-col-reverse rounded bg-white shadow md:w-3/5 lg:flex-row">
            <div class="w-full">
                <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                    <div class="flex flex-row-reverse items-center justify-between lg:flex-col lg:items-start">
                        <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-teal-400">
                            Sesi 2
                        </h4>
                    </div>
                    <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                        Video Materi
                    </h2>
                    <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                        We recommend this introduction as a starting point for how to move from face-to-face to
                        online
                        teaching. In this 60-minute webinar, we discuss how to effectively communicate with your
                        students &
                        the range of ways you can deliver content online.
                    </p>
                    <p class="my-3 w-11/12 text-sm font-normal tracking-normal text-gray-600 lg:w-9/12">
                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 576 512">
                            <path
                                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                        </svg>
                    </p>
                </div>
                <div
                    class="flex flex-row items-center justify-between border-t border-gray-300 px-5 py-3 md:px-10 lg:px-5 lg:py-4">
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
                                <a href="/courses/2/video"
                                    class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Buka
                                    Sesi</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="f-r-t container mx-auto mb-10 mt-10 flex flex-col-reverse rounded bg-white shadow md:w-3/5 lg:flex-row">
            <div class="w-full">
                <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                    <div class="flex flex-row-reverse items-center justify-between lg:flex-col lg:items-start">
                        <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-teal-400">
                            Sesi 3
                        </h4>
                    </div>
                    <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                        Assignment
                    </h2>
                    <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                        We recommend this introduction as a starting point for how to move from face-to-face to
                        online
                        teaching. In this 60-minute webinar, we discuss how to effectively communicate with your
                        students &
                        the range of ways you can deliver content online.
                    </p>
                    <p class="my-3 w-11/12 text-sm font-normal tracking-normal text-gray-600 lg:w-9/12">
                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 576 512">
                            <path
                                d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
                    </p>
                </div>
                <div
                    class="flex flex-row items-center justify-between border-t border-gray-300 px-5 py-3 md:px-10 lg:px-5 lg:py-4">
                    <div class="flex items-center">
                        <div class="flex items-center">

                            <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
                                <a href="/courses/3/asg"
                                    class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Buka
                                    Sesi</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="f-r-t container mx-auto mb-10 mt-10 flex flex-col-reverse rounded bg-white shadow md:w-3/5 lg:flex-row">
            <div class="w-full">
                <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                    <div class="flex flex-row-reverse items-center justify-between lg:flex-col lg:items-start">
                        <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-teal-400">
                            Sesi 4
                        </h4>
                    </div>
                    <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                        Final Test
                    </h2>
                    <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                        We recommend this introduction as a starting point for how to move from face-to-face to
                        online
                        teaching. In this 60-minute webinar, we discuss how to effectively communicate with your
                        students &
                        the range of ways you can deliver content online.
                    </p>
                    <p class="my-3 w-11/12 text-sm font-normal tracking-normal text-gray-600 lg:w-9/12">
                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512">
                            <path
                                d="M32 0C49.7 0 64 14.3 64 32V48l69-17.2c38.1-9.5 78.3-5.1 113.5 12.5c46.3 23.2 100.8 23.2 147.1 0l9.6-4.8C423.8 28.1 448 43.1 448 66.1V345.8c0 13.3-8.3 25.3-20.8 30l-34.7 13c-46.2 17.3-97.6 14.6-141.7-7.4c-37.9-19-81.3-23.7-122.5-13.4L64 384v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V400 334 64 32C0 14.3 14.3 0 32 0zM64 187.1l64-13.9v65.5L64 252.6V318l48.8-12.2c5.1-1.3 10.1-2.4 15.2-3.3V238.7l38.9-8.4c8.3-1.8 16.7-2.5 25.1-2.1l0-64c13.6 .4 27.2 2.6 40.4 6.4l23.6 6.9v66.7l-41.7-12.3c-7.3-2.1-14.8-3.4-22.3-3.8v71.4c21.8 1.9 43.3 6.7 64 14.4V244.2l22.7 6.7c13.5 4 27.3 6.4 41.3 7.4V194c-7.8-.8-15.6-2.3-23.2-4.5l-40.8-12v-62c-13-3.8-25.8-8.8-38.2-15c-8.2-4.1-16.9-7-25.8-8.8v72.4c-13-.4-26 .8-38.7 3.6L128 173.2V98L64 114v73.1zM320 335.7c16.8 1.5 33.9-.7 50-6.8l14-5.2V251.9l-7.9 1.8c-18.4 4.3-37.3 5.7-56.1 4.5v77.4zm64-149.4V115.4c-20.9 6.1-42.4 9.1-64 9.1V194c13.9 1.4 28 .5 41.7-2.6l22.3-5.2z" />
                        </svg>
                    </p>
                </div>
                <div
                    class="flex flex-row items-center justify-between border-t border-gray-300 px-5 py-3 md:px-10 lg:px-5 lg:py-4">
                    <div class="flex items-center">
                        <div class="flex items-center">

                            <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
                                <a href="/courses/3/asg"
                                    class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Buka
                                    Sesi</a>
                            </p>
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
