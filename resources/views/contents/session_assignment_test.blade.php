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
                            <span class="mb-1 ml-2">Sesi {{ $currentMaterialIndex + 1 }} : {{ $material->title }}</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container p-4 mx-auto my-4">
            <div class="my-4 no-wrap md:-mx-2 md:flex">
                <div class="w-full md:mx-2 md:w-3/12">
                    <!-- Sidebar-->
                    @include('contents.course_sidebar')
                </div>
                {{-- QUESTION  --}}
                <div id="asg-top" class="my-4"></div>

                <div class="mx-4 bg-white w-2xl h-fit rounded-xl md:mx-12 md:w-9/12">
                    <div class="p-6 mx-auto antialiased">
                        <div class="space-y-4">

                            @if ($material->materialContentToMasterType->master_type_name == 'Final Test')
                                <h1
                                    class="relative block w-auto py-4 mx-6 text-base font-bold tracking-normal text-gray-800 lg:text-xl">
                                    Mengenai Final Test
                                </h1>
                                <h2
                                    class="relative w-auto mx-6 mb-2 text-base font-semibold tracking-normal text-gray-800 lg:text-base">
                                    {{ $material->description }}
                                </h2>
                            @elseif ($material->materialContentToMasterType->master_type_name == 'Assignment')
                                <h1
                                    class="relative block w-auto py-4 mx-6 text-base font-bold tracking-normal text-gray-800 lg:text-xl">
                                    Mengenai Assignment
                                </h1>
                                <h2
                                    class="relative w-auto mx-6 mb-2 text-base font-semibold tracking-normal text-gray-800 lg:text-base">
                                    {{ $material->detailed_description }}
                                </h2>
                            @endif


                            <div class="grid w-full grid-cols-1 gap-4 pl-4 pr-8 font-semibold md:w-8/12 md:grid-cols-3">
                                <div class="px-2 py-4 bg-white rounded-lg">
                                    <div class="text-indigo-500">Waktu Pengerjaan</div>
                                    <div class="text-xs text-gray-500">{{ $material->material_duration }} Menit</div>
                                </div>
                                <div class="px-2 py-4 bg-white rounded-lg">
                                    <div class="text-indigo-500">Nilai Minimum</div>
                                    <div class="text-xs text-gray-500">min. {{ $material->minimum_score }}</div>
                                </div>
                                <div class="px-2 py-4 bg-white rounded-lg">
                                    <div class="text-indigo-500">Status Pengerjaan</div>
                                    <div class="text-xs text-gray-500">
                                        @if (!$materialCompleted)
                                            <a class="font-bold">Belum Dikerjakan</a>
                                        @elseif ($materialCompleted && $getMatCompleted->total_score >= $material->minimum_score)
                                            <a class="font-bold text-green-500">Lulus</a>
                                        @elseif ($materialCompleted && $getMatCompleted->total_score < $material->minimum_score)
                                            <a class="font-bold text-red-500">Belum Lulus</a>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            </h2>
                        </div>
                        @if ($material->materialContentToMasterType->master_type_name == 'Final Test' && !$materialCompleted)
                            <a href='/courses/material/{{ $material->title }}/{{ $material->course_id }}/{{ $material->id }}/{{ $firstRandomQuestionFIN->id }}/finalTest/1'
                                class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                <span class="items-center mx-2">Mulai Final Test
                                </span>

                            </a>
                        @elseif ($material->materialContentToMasterType->master_type_name == 'Final Test' && $materialCompleted)
                            <a href='/courses/material/{{ $material->course_id }}/{{ $material->id }}/finalTest/score'
                                class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                <span class="items-center mx-2">Lihat Hasil Final Test
                                </span>

                            </a>
                        @elseif ($material->materialContentToMasterType->master_type_name == 'Assignment' && !$materialCompleted)
                            <a href='/courses/material/{{ $material->title }}/{{ $material->course_id }}/{{ $material->id }}/{{ $firstRandomQuestionASG->id }}/assignment/1'
                                class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                <span class="items-center mx-2">Mulai Assignment
                                </span>

                            </a>
                        @elseif ($material->materialContentToMasterType->master_type_name == 'Assignment' && $materialCompleted)
                            <a href='/courses/material/{{ $material->course_id }}/{{ $material->id }}/assignment/score'
                                class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                <span class="items-center mx-2">Lihat Hasil Assignment
                                </span>
                            </a>
                        @endif

                    </div>
                </div>
            </div>
            <div
                class="fixed bottom-0 left-0 z-50 w-full h-16 bg-white border-t border-gray-200 dark:border-gray-600 dark:bg-gray-700">
                <div class="grid h-full max-w-lg grid-cols-2 mx-auto font-medium">
                    @if ($previousMaterial)
                        <button type="button">
                            <a href="{{ url('/courses/' . 'material/' . $previousMaterialTitle . '/' . $material->course_id . '/' . $previousMaterialId) }}"
                                class="inline-flex flex-col items-center justify-center px-5 group hover:bg-gray-50 dark:hover:bg-gray-800">


                                <svg class="group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"
                                    fill="currentColor">
                                    <path
                                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                                </svg>
                                <span
                                    class="text-base text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-500">Balik</span>
                            </a>
                        </button>
                    @endif

                    @if ($nextMaterial && $nextMaterial->is_visible == true)
                        <button type="button">
                            <a href="{{ url('/courses/' . 'material/' . $nextMaterialTitle . '/' . $material->course_id . '/' . $nextMaterialId) }}"
                                class="inline-flex flex-col items-center justify-center px-5 group hover:bg-gray-50 dark:hover:bg-gray-800">

                                <svg class="group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"
                                    fill="currentColor">
                                    <path
                                        d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                                </svg>
                                <span
                                    class="text-base text-gray-500 group-hover:text-blue-600 dark:text-gray-400 dark:group-hover:text-blue-500">Lanjut</span>
                            </a>
                        </button>
                    @endif

                </div>
            </div>
    </body>
@endsection
@section('footer')
    @include('layout.footer')
@endsection
<script>
    console.log("SCRIPT LOADED")
    let currentIndex = 0;
    const sidebars = @json($sidebars); // Assuming you pass the data from Laravel to JavaScript

    function navigate(direction) {
        if (direction === 'next') {
            currentIndex = Math.min(currentIndex + 1, sidebars.length - 1);
        } else if (direction === 'back') {
            currentIndex = Math.max(currentIndex - 1, 0);
        }

        const url = direction === 'next' ?
            `/courses/material/next/${sidebars[currentIndex].title}/${sidebars[currentIndex].course_id}/${sidebars[currentIndex].material_id}` :
            `/courses/material/previous/${sidebars[currentIndex].title}/${sidebars[currentIndex].course_id}/${sidebars[currentIndex].material_id}`;

        // Fetch the URL or update content based on your requirements
        fetch(url)
            .then(response => {
                console.log(response);

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                return response.json();
            })
            .then(data => {
                console.log(data);

                // TODO: Handle the response data
                // You may want to update the content based on the data received from the backend.

            })
            .catch(error => console.error('Error:', error));
    }
</script>

</html>
