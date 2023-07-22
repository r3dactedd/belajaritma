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

<body class="bg-gray-200">
    @section('title', 'Homepage')
    @extends('layout')
    @section('header')
        @include('header')
    @endsection
    @section('content')
        <div class="bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>
                    <p class="flex items-center text-xs text-teal-400">
                        <span>Home</span>
                        <span class="mx-2">&gt;</span>
                        <span>Kursus</span>
                        <span class="mx-2">&gt;</span>
                        <span>Nama Kursus</span>
                    </p>
                    <h4 class="text-2xl font-bold leading-tight text-gray-800">
                        Insert Nama Kursus
                    </h4>
                </div>
                <div class="mt-6 md:mt-0">
                    <button
                        class="flex items-center rounded bg-teal-400 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-teal-800 focus:outline-none">
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
        <div class="f-r-t container mx-auto mb-10 mt-10 flex w-3/5 flex-col-reverse rounded bg-white shadow lg:flex-row">
            <div class="w-full lg:w-1/2">
                <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                    <div class="flex flex-row-reverse items-center justify-between lg:flex-col lg:items-start">
                        <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-teal-400">
                            Sesi 1
                        </h4>
                    </div>
                    <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                        PDF Materi
                    </h2>
                    <p class="mb-6 w-11/12 text-sm font-normal tracking-normal text-gray-600 lg:w-9/12">
                        We recommend this introduction as a starting point for how to move from face-to-face to online
                        teaching. In this 60-minute webinar, we discuss how to effectively communicate with your students &
                        the range of ways you can deliver content online.
                    </p>
                    <p class="my-3 w-11/12 text-sm font-normal tracking-normal text-gray-600 lg:w-9/12">
                        <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                            <path
                                d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V304H176c-35.3 0-64 28.7-64 64V512H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM176 352h32c30.9 0 56 25.1 56 56s-25.1 56-56 56H192v32c0 8.8-7.2 16-16 16s-16-7.2-16-16V448 368c0-8.8 7.2-16 16-16zm32 80c13.3 0 24-10.7 24-24s-10.7-24-24-24H192v48h16zm96-80h32c26.5 0 48 21.5 48 48v64c0 26.5-21.5 48-48 48H304c-8.8 0-16-7.2-16-16V368c0-8.8 7.2-16 16-16zm32 128c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H320v96h16zm80-112c0-8.8 7.2-16 16-16h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v32h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V432 368z" />
                        </svg>
                    </p>
                </div>
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
                        <div class="ml-6 flex items-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="f-r-t container mx-auto mb-10 mt-10 flex w-3/5 flex-col-reverse rounded bg-white shadow lg:flex-row">
            <div class="w-full lg:w-1/2">
                <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                    <div class="flex flex-row-reverse items-center justify-between lg:flex-col lg:items-start">
                        <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-teal-400">
                            Sesi 2
                        </h4>
                    </div>
                    <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                        Video Materi
                    </h2>
                    <p class="mb-6 w-11/12 text-sm font-normal tracking-normal text-gray-600 lg:w-9/12">
                        We recommend this introduction as a starting point for how to move from face-to-face to online
                        teaching. In this 60-minute webinar, we discuss how to effectively communicate with your students &
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
                        <div class="ml-6 flex items-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="f-r-t container mx-auto mb-10 mt-10 flex w-3/5 flex-col-reverse rounded bg-white shadow lg:flex-row">
            <div class="w-full lg:w-1/2">
                <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                    <div class="flex flex-row-reverse items-center justify-between lg:flex-col lg:items-start">
                        <h4 class="text-md text-base font-semibold leading-4 tracking-normal text-teal-400">
                            Sesi 3
                        </h4>
                    </div>
                    <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                        Final Test
                    </h2>
                    <p class="mb-6 w-11/12 text-sm font-normal tracking-normal text-gray-600 lg:w-9/12">
                        We recommend this introduction as a starting point for how to move from face-to-face to online
                        teaching. In this 60-minute webinar, we discuss how to effectively communicate with your students &
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
                                <a href="/courses/2/video"
                                    class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Buka
                                    Sesi</a>
                            </p>
                        </div>
                        <div class="ml-6 flex items-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="f-r-t container mx-auto mb-10 mt-10 flex w-3/5 flex-col-reverse rounded lg:flex-row">
            <div class="w-full lg:w-1/2">
                <div class="flex items-center px-5">

                    <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
                        <a href="/courses/2/video"
                            class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Buka
                            Sesi</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="f-r-t container mx-auto mb-10 mt-10 flex w-3/5 flex-col-reverse rounded lg:flex-row">
            <div class="w-full lg:w-1/2">
                <div class="flex items-center px-5">

                    <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
                        <a href="/courses/2/video"
                            class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Forum
                            Test</a>
                    </p>
                </div>
            </div>
        </div>

    </body>
@endsection

</html>
