<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <link href="style.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body class="pb-12 bg-gray-200">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <div class="px-5 bg-white scroll-smooth sm:px-10">
            <div class="container flex flex-col items-start justify-between py-6 mx-auto md:flex-row md:items-center">
                <div>
                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Detail Kursus</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container w-full p-6 mx-auto my-auto lg:w-8/12">
            <div class="my-4 bg-white rounded-xl md:flex">
                <!-- Left Side -->
                <div class="w-full md:w-1/3">
                    <!-- Profile Card -->
                    <div class="h-full p-2 md:py-4 md:pl-8">
                        <div class="w-full mx-auto">
                            <img class="w-full p-4 max-h-64 md:px-0"
                                src="{{ asset('uploads/course_images/' . $data->course_img) }}"alt="Course Image" />
                        </div>
                    </div>
                </div>

                <div class="w-full h-auto md:mx-2 md:w-2/3">
                    <div class="px-6 py-2 bg-white rounded-xl md:px-12">
                        <h1
                            class="py-2 text-xl font-bold tracking-normal text-center text-gray-800 md:py-6 md:pr-4 md:text-left lg:text-3xl">
                            {{ $data->course_name }}
                        </h1>
                        <p class="mb-6 font-normal tracking-normal text-gray-600 text-md">
                            {{ $data->short_desc }}
                        </p>
                        <div class="grid grid-row-2 md:grid-cols-2">
                            <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                <div
                                    class="flex items-center mt-6 mb-3 space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">{{ $data->level }}</span>
                                </div>

                                <div
                                    class="flex items-center mt-6 mb-3 space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">
                                        {{ $data->students_enrolled }}
                                        Siswa</span>
                                </div>
                            </div>
                            <div class="flex flex-row items-center justify-between md:ml-8 lg:flex-col lg:items-start">
                                <div
                                    class="flex items-center mt-6 mb-3 space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    <a href="#syllabus"
                                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white align-middle transition duration-150 ease-in-out bg-indigo-600 rounded-md hover:bg-teal-800 focus:outline-none md:w-36">
                                        <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            height="1.1em" viewBox="0 0 576 512" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        Lihat Materi
                                    </a>
                                </div>
                                <div
                                    class="flex items-center mt-6 mb-3 space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    @if (auth()->check() &&
                                            auth()->user()->isEnrolled($data->id))
                                        <a href="/courses/material/{{ $data->course_name }}/{{ $data->id }}/{{ $userCourseDetail->last_accessed_material }}"
                                            class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white align-middle bg-green-400 rounded-md hover:bg-indigo-600 md:w-36">
                                            <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                                height="1.1em" viewBox="0 0 512 512">
                                                <path
                                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM294.6 135.1c-4.2-4.5-10.1-7.1-16.3-7.1C266 128 256 138 256 150.3V208H160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h96v57.7c0 12.3 10 22.3 22.3 22.3c6.2 0 12.1-2.6 16.3-7.1l99.9-107.1c3.5-3.8 5.5-8.7 5.5-13.8s-2-10.1-5.5-13.8L294.6 135.1z" />
                                            </svg>
                                            Lanjut Kelas
                                        </a>
                                    @else
                                        <a data-modal-target="popup-enroll" data-modal-toggle="popup-enroll"
                                            class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white align-middle bg-green-400 rounded-md hover:bg-indigo-600 md:w-36">
                                            <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                                height="1.1em" viewBox="0 0 512 512">
                                                <path
                                                    d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM294.6 135.1c-4.2-4.5-10.1-7.1-16.3-7.1C266 128 256 138 256 150.3V208H160c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h96v57.7c0 12.3 10 22.3 22.3 22.3c6.2 0 12.1-2.6 16.3-7.1l99.9-107.1c3.5-3.8 5.5-8.7 5.5-13.8s-2-10.1-5.5-13.8L294.6 135.1z" />
                                            </svg>
                                            Daftar Kelas
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4"></div>
            <div class="mx-auto my-auto md:-mx-2 md:flex">
                <div class="w-full h-auto md:mx-2">
                    <div class="p-4 bg-white shadow-sm rounded-t-xl">
                        <div class="flex items-center mb-3 ml-2 space-x-2 font-semibold leading-8 text-gray-900">

                            <span class="px-2 text-xl tracking-wide">Mengenai Kursus</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="flex text-sm">
                                <div class="block">
                                    <div class="px-4 py-2 font-semibold">{{ $data->course_desc }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 bg-white shadow-sm rounded-b-xl">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div>
                                <div class="flex items-center mb-3 ml-2 space-x-2 font-semibold leading-8 text-gray-900">

                                    <span class="px-2 text-xl tracking-wide">Spesifikasi Minimum</span>
                                </div>
                                <div class="grid grid-cols-1 gap-4 py-4 pl-4 pr-8 font-semibold md:grid-cols-2">
                                    <div class="p-4 bg-white rounded-lg shadow-md">
                                        <div class="text-indigo-500">Resolusi Layar</div>
                                        <div class="text-xs text-gray-500">{{ $data->screen_resolution }}</div>
                                    </div>
                                    <div class="p-4 bg-white rounded-lg shadow-md">
                                        <div class="text-indigo-500">Minimum RAM</div>
                                        <div class="text-xs text-gray-500">{{ $data->minimum_ram }}</div>
                                    </div>
                                    <div class="p-4 bg-white rounded-lg shadow-md">
                                        <div class="text-indigo-500">Processor</div>
                                        <div class="text-xs text-gray-500">{{ $data->processor }}</div>
                                    </div>
                                    <div class="p-4 bg-white rounded-lg shadow-md">
                                        <div class="text-indigo-500">Operating System</div>
                                        <div class="text-xs text-gray-500">{{ $data->operating_system }}</div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div
                                    class="flex items-center mt-6 mb-3 ml-2 space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">

                                    <span class="px-2 text-xl tracking-wide">Program Lain yang Diperlukan</span>
                                </div>
                                <div class="flex text-sm md:w-3/4">
                                    <div class="block">
                                        <div class="px-4 py-2 font-semibold">{{ $data->other_programs }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 id="syllabus" class="my-8 text-3xl font-semibold text-center">Daftar Materi </h1>
            <div class="my-4"></div>

            {{-- MATERI LIST START --}}
            @php
                $index = 1;
            @endphp

            @foreach ($material as $materialItem)
                <div class="container flex flex-col-reverse mx-auto mb-10 bg-white shadow rounded-xl md:w-3/5 lg:flex-row">

                    <div class="w-full px-4">
                        <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                            <div class="flex items-center justify-between pt-4 lg:flex-col lg:items-start">
                                <h4 class="text-base font-semibold leading-4 tracking-normal text-indigo-600 text-md">
                                    Sesi {{ $index }}
                                </h4>
                            </div>

                            <h2 class="mt-4 mb-2 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                {{ $materialItem->title }}
                            </h2>
                            <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                                {{ $materialItem->description }}
                            </p>
                            <div
                                class="grid items-start grid-cols-2 pb-6 pr-4 md:flex md:flex-col lg:flex-row lg:items-center">
                                <div class="flex items-center">

                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                    </svg>
                                    <p class="ml-2 text-sm font-normal tracking-normal text-center text-gray-600">
                                        {{ $materialItem->material_duration }} Menit
                                    </p>
                                </div>
                                <div class="flex items-end ml-0 lg:ml-12 lg:mt-0">
                                    @if ($materialItem->materialContentToMasterType->master_type_name == 'PDF')
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                            <path
                                                d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                        </svg>
                                    @endif
                                    @if ($materialItem->materialContentToMasterType->master_type_name == 'Video')
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                            <path
                                                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z" />
                                        </svg>
                                    @endif

                                    @if ($materialItem->materialContentToMasterType->master_type_name == 'Assignment')
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <path
                                                d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H256c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H192c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                        </svg>
                                    @endif
                                    @if ($materialItem->materialContentToMasterType->master_type_name != 'Final Test')
                                        <p class="ml-2 text-sm font-normal text-gray-600">
                                            {{ $materialItem->materialContentToMasterType->master_type_name }}
                                        </p>
                                    @endif
                                    @if ($materialItem->materialContentToMasterType->master_type_name == 'Final Test')
                                        <div class="flex items-end ml-0 lg:ml-12 lg:mt-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                <path
                                                    d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                            </svg>
                                            <p class="ml-2 text-sm font-normal text-gray-600">
                                                {{ $materialItem->total_questions }} Pertanyaan
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="transition hover:bg-indigo-50">
                            </div>
                            @if (
                                $materialItem->materialContentToMasterType->master_type_name == 'Final Test' &&
                                    auth()->user()->isReadyForFinal($data->id))
                                <div class="flex items-center">
                                    <div class="flex items-center">

                                        <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                            <a href="/transaction" id="convertButton"
                                                class="inline-block px-4 py-2 text-sm font-semibold text-white bg-indigo-600 bg-selected rounded-xl hover:bg-green-400">Ambil
                                                Test</a>
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @php
                    $index++;
                @endphp
            @endforeach
            {{-- <div class="container flex flex-col-reverse mx-auto mb-10 bg-white shadow rounded-xl md:w-3/5 lg:flex-row">
                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <div class="flex items-center justify-between pt-4 lg:flex-col lg:items-start">
                            <h4 class="text-base font-semibold leading-4 tracking-normal text-indigo-600 text-md">
                                Session 4
                            </h4>
                        </div>

                        <h2 class="mt-4 mb-2 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            Final Test
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            Memuat test akhir untuk kursus Algoritma dan Pemrograman
                        </p>
                        <div
                            class="grid items-start grid-cols-2 pb-6 pr-4 md:flex md:flex-col lg:flex-row lg:items-center">
                            <div class="flex items-center">

                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                </svg>
                                <p class="ml-2 text-sm font-normal tracking-normal text-center text-gray-600">90 Menit
                                </p>
                            </div>
                            <div class="flex items-end ml-0 lg:ml-12 lg:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                    <path
                                        d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                </svg>
                                <p class="ml-2 text-sm font-normal text-gray-600">
                                    50 Pertanyaan
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center">

                                <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                    <a href="/transaction" id="convertButton"
                                        class="inline-block px-4 py-2 text-sm font-semibold text-white bg-indigo-600 bg-selected rounded-xl hover:bg-green-400">Ambil
                                        Test</a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div> --}}
            <div class="container flex flex-col-reverse mx-auto mb-10 bg-white shadow rounded-xl md:w-3/5 lg:flex-row">
                <div class="w-full px-4">
                    <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <h2 class="mt-4 mb-2 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                            Sertifikasi Penyelesaian Kursus (MUNCULIN ABIS SELESAI FINAL TEST)
                        </h2>
                        <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                            Selamat! Anda telah menyelesaikan kursus ini. Silahkan mengunduh sertifikat anda.
                        </p>
            @if (auth()->user()->hasCompletedCourse($data->id))
                <div class="container flex flex-col-reverse mx-auto mb-10 bg-white shadow rounded-xl md:w-3/5 lg:flex-row">
                    <div class="w-full px-4">
                        <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                            <h2 class="mt-4 mb-2 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                Sertifikasi Penyelesaian Kursus (MUNCULIN ABIS SELESAI FINAL TEST)
                            </h2>
                            <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                                Selamat! Anda telah menyelesaikan kursus ini. Silahkan mengunduh sertifikat anda.
                            </p>

                            <div class="flex items-center">
                                <div class="flex items-center">

                                <p onclick="downloadimage()"
                                    class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                    <a
                                        class="inline-block px-4 py-2 text-sm font-semibold text-white bg-indigo-600 bg-selected rounded-xl hover:bg-green-400">Unduh
                                        Sertifikat</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="popup-enroll" tabindex="-1"
                class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-enroll">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda yakin
                                ingin
                                mendaftar kelas ini?</h3>
                            <div class="flex justify-center text-center">
                                <form method="POST" action="/courses/enroll/{{ $data->id }}"
                                    data-course-id="{{ $data->id }}">
                                    @csrf
                                    <button type="submit"
                                        class="mr-2 items-center rounded-lg bg-green-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800">
                                        Ya, daftar
                                    </button>
                                </form>
                                <button type="button"
                                    class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-indigo-400 hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200"
                                    data-modal-hide="popup-enroll">
                                    Tidak, batalkan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}
    {{-- CERTIFICATION HERE --}}
    <style>
        .cert {
            border: 15px solid #0072c6;
            border-right: 15px solid #0894fb;
            border-left: 15px solid #0894fb;
            width: 5.83in;
            /* Set width to 8.27 inches for A4 size */
            height: 8.27in;
            /* Set height to 11.69 inches for A4 size */
            font-family: arial;
            color: #383737;
        }

        .crt_title {
            margin-top: 60px;
            font-size: 40px;
            font-style: bold;
            letter-spacing: 0.5px;
            color: #0060a9;
        }

        .crt_logo img {
            width: 130px;
            height: auto;
            margin: auto;
            padding: 30px;
        }

        .colorGreen {
            color: #27ae60;
        }

        .crt_user {
            display: inline-block;
            width: 80%;
            padding: 5px 25px;
            margin-bottom: 0px;
            padding-bottom: 0px;
            font-size: 40px;
            border-bottom: 1px dashed #cecece;
        }

        .afterName {
            font-weight: 100;
            color: #383737;
        }

        .colorGrey {
            color: grey;
        }

        .certSign {
            width: 200px;
        }

        .marginBottom {
            margin-bottom: 80px;
        }

        @media (max-width: 700px) {
            .cert {
                width: 100%;
            }
        }
    </style>

    <table id="certificate" class="hidden bg-white cert">

        <tr>
            <td align="center">
                <h1 class="crt_title">Certificate Of Completion
                    <h2 class="my-6 font-semibold afterName">Sertifikat ini Diberikan Kepada</h2>
                    <h1 class="colorGreen crt_user">Insert Name Here</h1>
                    <h3 class="mt-8 afterName">Dalam Menyelesaikan Kursus</h3>
                    <h2 class="mt-4 afterName">Insert Course Name Here</h2>
                    <h3 class="mt-4 mb-12">Pada Tanggal <span class="font-semibold"> {{ date('Y-m-d') }}</span></h3>
            </td>

        </tr>
    </table>

    <script>
        function downloadImage() {
            //var container = document.getElementById("image-wrap"); //specific element on page
            var container = document.getElementById("certificate");
            container.classList.remove("hidden") // full page
            html2canvas(container, {
                allowTaint: true,
                useCORS: true
            }).then(function(canvas) {

                var link = document.createElement("a");
                document.body.appendChild(link);
                link.download = "certificate.jpg";
                link.href = canvas.toDataURL();
                link.target = '_blank';
                link.click();
            });
            container.classList.add("hidden")
        }
    </script>

@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
