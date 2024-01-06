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
                            <span class="mb-1 ml-2">Sesi {{ $currentMaterialIndex + 1 }} : {{ $material->title }}</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-5 p-5">
            <div class="no-wrap my-4 md:-mx-2 md:flex">
                <div class="w-full md:mx-2 md:w-3/12">
                    <!-- Sidebar, pass value courselistnya aja-->
                    @include('contents.course_sidebar')
                </div>
                <div class="my-4"></div>
                <div class="w-full rounded bg-white shadow md:mx-2 md:w-9/12">

                    <iframe src="{{ asset('uploads/material_pdf/' . $material->pdf_link) }}" type="application/pdf"
                        width="100%" height="1024">
                        This browser does not support PDFs. Please download the PDF to view it: <a
                            href="{{ asset('uploads/material_pdf/' . $material->pdf_link) }}">Download
                            PDF</a>
                    </iframe>

                </div>
            </div>
        </div>
        <div
            class="fixed bottom-0 left-0 z-50 h-16 w-full border-t border-gray-200 bg-white dark:border-gray-600 dark:bg-gray-700">
            <div class="mx-auto grid h-full max-w-lg grid-cols-2 font-medium">
                @if ($previousMaterial)
                    <button type="button">
                        <a href="{{ url('/courses/' . 'material/' . $previousMaterial->title . '/' . $material->course_id . '/' . $previousMaterial->material_id) }}"
                            class="group inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800">


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
                @if ($nextMaterial)
                    <button type="button">
                        <a href="{{ url('/courses/' . 'material/' . $nextMaterial->title . '/' . $material->course_id . '/' . $nextMaterial->material_id) }}"
                            class="group inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800">

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
        console.log("ini isi url", url)

        // Fetch the URL or update content based on your requirements
        fetch(url)
            .then(response => {
                console.log('Response:', response);

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const contentType = response.headers.get('content-type');
                if (!contentType || !contentType.includes('application/json')) {
                    throw new Error('Response is not in JSON format');
                }

                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);

                // TODO: Handle the response data
                // You may want to update the content based on the data received from the backend.

            })
            .catch(error => console.error('Error:', error));
    }
</script>

</html>
