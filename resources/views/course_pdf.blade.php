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
                        <span class="mx-2">&gt;</span>
                        <span>Nama Materi</span>
                    </p>
                    <h4 class="text-2xl font-bold leading-tight text-gray-800">
                        Materi Kursus
                    </h4>
                </div>
                <div class="mt-6 md:mt-0">
                    <button
                        class="flex items-center rounded bg-teal-400 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
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
        <div class="container mx-auto my-5 p-5">
            <div class="no-wrap my-4 md:-mx-2 md:flex">
                <div class="w-full md:mx-2 md:w-2/12">
                    <!-- Profile Card -->
                    <div class="hidden border-t-4 border-green-400 bg-white p-3 md:flex">

                        <div class="mx-auto w-full p-6">
                            <img src="{{ Storage::url('image/mario.jpg') }}" alt="e" />
                        </div>
                    </div>
                </div>
                <div class="my-4"></div>
                <div class="h-64 w-full rounded bg-white shadow md:mx-2 md:w-9/12">

                    <iframe src="{{ Storage::url('pdf_folder/test.pdf') }}" width="100%" height="1200">
                        This browser does not support PDFs. Please download the PDF to view it: <a
                            href="{{ asset('public\storage\pdf_folder\Materi_Briefing_24_Pre-Thesis_R1-2.pdf') }}">Download
                            PDF</a>
                    </iframe>

                </div>
            </div>
        </div>
    </body>
@endsection

</html>
