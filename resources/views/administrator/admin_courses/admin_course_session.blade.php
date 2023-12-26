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
                            <span class="mb-1 ml-2">Edit Materi Kursus</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto w-full p-6 md:w-9/12">
            <div class="mx-auto flex">
                <ol
                    class="flex w-full items-center space-x-2 p-3 text-center text-sm font-medium text-gray-500 rtl:space-x-reverse sm:space-x-4 sm:p-4 sm:text-base">
                    <li class="flex items-center text-blue-600 dark:text-blue-500">

                        <span
                            class="me-2 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border border-blue-600 text-xs dark:border-blue-500">
                            1
                        </span>
                        <a href="/manager/course/create">
                            Pengisian Data Kursus
                        </a>
                        <svg class="ms-2 h-3 w-3 rtl:rotate-180 sm:ms-4" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>

                    </li>
                    <li class="flex items-center text-blue-600 dark:text-blue-500">
                        <span
                            class="me-2 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border border-blue-600 text-xs dark:border-blue-500">
                            2
                        </span>
                        <a href="/manager/course/list">
                            Daftar Materi Kursus
                        </a>
                        <svg class="ms-2 h-3 w-3 rtl:rotate-180 sm:ms-4" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li class="flex items-center text-blue-600 dark:text-blue-500">
                        <span
                            class="me-2 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border border-blue-600 text-xs dark:border-blue-500">
                            3
                        </span>
                        <a href="/manager/course/session/1/edit">
                            Pengaturan Materi Kursus
                        </a>

                    </li>
                </ol>

            </div>
            <form id="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mx-auto my-4 md:-mx-2 md:flex">
                    <div class="h-auto w-full md:mx-2">
                        <div class="rounded-xl bg-white p-4 shadow-sm">

                            <div class="px-4 font-semibold">
                                <label for="username"
                                    class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                    Judul Materi</label>
                                <input type="text" name="username" id=""
                                    class="mb-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-center text-lg text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500 md:text-left"
                                    placeholder="Tulis Nama Materi" required="" value="Algoritma dan Pemrograman ">
                            </div>
                            <div class="px-4 font-semibold">
                                <label for="username"
                                    class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                    Deskripsi Singkat Materi</label>
                                <textarea id="myInfo"
                                    class="mt-focus:ring-primary-600 mb-6 block h-20 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Input Deskripsi Singkat mengenai Kursus" required="">
                                Course Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
                            </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="my-4"></div>
            <form id="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mx-auto my-auto md:-mx-2 md:flex">
                    <div class="h-auto w-full md:mx-2">
                        <div class="rounded-xl bg-white p-4 shadow-sm">

                            <div class="px-4 font-semibold">
                                <label for="username"
                                    class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                    (muncul kalau content typenya PDF) </label>


                                <label
                                    class="text-blue border-blue hover:bg-blue flex w-48 cursor-pointer flex-col items-center rounded-lg border bg-white p-2 tracking-wide shadow-lg hover:bg-indigo-500 hover:text-white">

                                    <span class="text-base leading-normal">Upload File PDF</span>
                                    <input type='file' id="pdfInput" class="hidden" onchange="previewImage()" />
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <div class="my-4"></div>
            <div id="" class="mx-auto my-auto md:-mx-2 md:flex">
                <div class="h-auto w-full md:mx-2">
                    <div class="rounded-xl bg-white p-4 shadow-sm">

                        <div class="px-4 font-semibold">
                            <label for="username" class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                (muncul kalau content typenya Video) </label>
                            <label for="username" class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                Upload Link Video</label>
                            <input type="text" name="username" id="videoLink"
                                class="mt-focus:ring-primary-600 mb-6 block h-12 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500 md:w-1/2"
                                placeholder="Isi Link Video" required="">
                        </div>
                        <div id="videoPreview"
                            class="mb-3 flex items-center space-x-2 px-4 font-semibold leading-8 text-gray-900">
                            <button onclick="embedVideo()"
                                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 align-middle text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-teal-800 focus:outline-none md:w-40">
                                <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg" height="1.1em"
                                    viewBox="0 0 576 512" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                </svg>
                                Simpan Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4"></div>
            <div class="mx-auto my-auto md:-mx-2 md:flex">
                <div class="h-auto w-full md:mx-2">
                    <div class="rounded-xl bg-white p-4 shadow-sm">
                        <div class="mx-auto px-4">
                            <div class="font-semibold">
                                <label for="username"
                                    class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                    (muncul kalau content typenya Assignment) </label>
                            </div>
                            <div class="font-semibold">
                                <label for="username"
                                    class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                    Penjelasan Assignment</label>
                                <textarea id="myInfo"
                                    class="mt-focus:ring-primary-600 mb-6 block h-20 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Input Deskripsi Singkat mengenai Kursus" required="">
                                Course Desc max 300 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
                            </textarea>
                                <div class="mb-6 font-semibold">
                                    <div class="grid grid-cols-1 md:grid-cols-2">

                                        <div>
                                            <label for="username"
                                                class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                                Nilai Minimum</label>
                                            <input type="number" name="username" id="inputUsername"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Input nilai minimum untuk menyelesaikan assignment"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <label for="username"
                                    class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                    List Pertanyaan </label>
                                <div class="relative overflow-x-auto">
                                    <table
                                        class="text-md mx-auto w-full border-x text-left font-semibold text-gray-500 shadow-md sm:rounded-lg">
                                        <thead class="bg-gray-200 text-xs uppercase text-gray-700">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    No
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Pertanyaan
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Jawaban Tepat
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Aksi
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr class="border-b border-opacity-20 bg-white dark:border-gray-700">
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                    1
                                                </td>
                                                <td scope="row" class="px-6 py-4 text-gray-800">
                                                    Dibawah ini yang merupakan penjelasan tepat untuk Algoritma adalah:
                                                </td>
                                                <td class="px-6 py-4 text-gray-800">
                                                    A | Prosedur sistematis untuk
                                                    menyelesaikan
                                                    masalah
                                                    matematika dalam
                                                    langkah
                                                    yang terbatas, atau urutan
                                                    pengambilan keputusan yang logis untuk memecahkan masalah.
                                                </td>

                                                <td class="px-6 py-4">
                                                    <div class="item-center flex justify-center">
                                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                                            data-modal-target="defaultModal"
                                                            data-modal-toggle="defaultModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-red-500"
                                                            data-modal-target="popup-delete"
                                                            data-modal-toggle="popup-delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="border-b border-opacity-20 bg-white dark:border-gray-700">
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                    2
                                                </td>
                                                <td scope="row" class="px-6 py-4 text-gray-800">
                                                    QUESTION2
                                                </td>
                                                <td class="px-6 py-4 text-gray-800">
                                                    C | Prosedur sistematis untuk
                                                    menyelesaikan
                                                    masalah
                                                    matematika dalam
                                                    langkah
                                                    yang terbatas, atau urutan
                                                    pengambilan keputusan yang logis untuk memecahkan masalah.
                                                </td>

                                                <td class="px-6 py-4">
                                                    <div class="item-center flex justify-center">
                                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                                            data-modal-target="defaultModal"
                                                            data-modal-toggle="defaultModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-red-500"
                                                            data-modal-target="popup-delete"
                                                            data-modal-toggle="popup-delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr
                                                class="border-b border-opacity-20 bg-white hover:bg-indigo-600 hover:text-white dark:border-gray-700">
                                                <td class="px-6 py-3 text-center font-semibold" colspan="4">

                                                    <p class="inline-flex items-center align-middle"
                                                        data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                                                        <svg class="mr-4 fill-black hover:fill-white"
                                                            xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                            viewBox="0 0 512 512">
                                                            <path
                                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0-13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                        </svg>
                                                        Buat Materi Baru
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container mx-auto my-5 p-5">
                <div class="no-wrap my-4 md:-mx-2 md:flex">
                    <div class="my-4"></div>
                    <div id="pdfPreviewContainer" class="hidden w-full rounded bg-white shadow md:mx-2">
                        <!-- PDF preview will be displayed here -->
                    </div>
                </div>
            </div>

            <div class="container mx-auto my-5 p-5">
                <div class="no-wrap my-4 md:-mx-2 md:flex">
                    <div class="my-4"></div>
                    <div id="videoContainer" class="container mx-auto my-5 p-5">
                        <!-- YouTube video will be embedded here -->
                    </div>
                </div>
            </div>


            <div id="defaultModal" tabindex="-1" aria-hidden="true"
                class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                <div class="z-50 mx-auto w-full overflow-y-auto rounded bg-white shadow-lg md:w-3/5">
                    <div class="overflow-y-auto px-2 py-2 text-left md:px-6">
                        <div class="container mx-auto my-5 p-5">
                            {{-- EDIT PROFILE --}}
                            <div class="flex justify-end">
                                <button type="button"
                                    class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="defaultModal">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="mx-auto rounded-xl bg-white px-2 py-2">
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Pertanyaan Baru (/
                                    Edit Pertanyaan kalau edit)
                                </h2>
                                <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                        {{-- Input Area --}}
                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Input Pertanyaan</label>
                                            <textarea id="myInfo"
                                                class="block h-32 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Input Penjelasan Singkat mengenai Materi" required=""></textarea>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Pilihan Jawaban</label>
                                            <input type="text" name="username" id="inputUsername"
                                                class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Jawaban A" required="">
                                            <input type="text" name="username" id="inputUsername"
                                                class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Jawaban B" required="">
                                            <input type="text" name="username" id="inputUsername"
                                                class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Jawaban C" required="">
                                            <input type="text" name="username" id="inputUsername"
                                                class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Jawaban D" required="">
                                        </div>
                                        <div class="sm:col-span-1">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Pilihan Jawaban Tepat</label>
                                            <select
                                                class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2.5 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                                <option value="">Pilih Jawaban Yang Tepat untuk Pertanyaan</option>
                                                <option value="for-rent">A</option>
                                                <option value="for-rent">B</option>
                                                <option value="for-rent">C</option>
                                                <option value="for-rent">D</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--Footer-->
                            <div class="flex justify-end pt-2">
                                <a href="/manager/course/session/1/edit"
                                    class="mt-2 rounded-lg bg-indigo-600 p-3 px-4 text-white hover:bg-indigo-400">Buat
                                    Pertanyaan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Delete Popup --}}
            <div id="popup-delete" tabindex="-1"
                class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                <div class="relative max-h-full w-full max-w-md">
                    <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="popup-delete">
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin
                                menghapus pertanyaan tersebut?
                            </h3>
                            <div class="flex justify-center text-center">
                                {{-- <form method="POST" action="/manager/course/delete/{{ $data->id }}" data-course-id=""> --}}
                                <form method="POST" action="#" data-course-id="">
                                    @csrf
                                    @method('DELETE')
                                    <button data-modal-hide="popup-delete" type="submit"
                                        class="mr-2 items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                        Ya, hapus
                                    </button>
                                </form>
                                <button data-modal-hide="popup-delete" type="button"
                                    class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-indigo-400 hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200">Tidak,
                                    batalkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Delete Popup --}}
    </body>
    <script>
        // Get references to the file input and preview container
        const pdfInput = document.getElementById('pdfInput');
        const pdfPreviewContainer = document.getElementById('pdfPreviewContainer');

        // Add an event listener to the file input to detect changes
        pdfInput.addEventListener('change', function() {
            // Check if a file is selected
            if (pdfInput.files.length > 0) {
                const file = pdfInput.files[0];

                // Check if the selected file is a PDF
                if (file.type === 'application/pdf') {
                    // Create a URL for the selected PDF
                    const pdfURL = URL.createObjectURL(file);
                    pdfPreviewContainer.classList.remove('hidden');
                    // Create an <object> element to display the PDF
                    const pdfObject = document.createElement('object');
                    pdfObject.data = pdfURL;
                    pdfObject.type = 'application/pdf';
                    pdfObject.width = '100%';
                    pdfObject.height = '1024';

                    // Replace the content of the preview container with the PDF
                    pdfPreviewContainer.innerHTML = '';
                    pdfPreviewContainer.appendChild(pdfObject);
                } else {
                    // Display an error message if the selected file is not a PDF
                    pdfPreviewContainer.innerHTML = 'Selected file is not a PDF.';
                }
            } else {
                // Clear the preview container if no file is selected
                pdfPreviewContainer.innerHTML = '';
            }
        });

        function embedVideo() {
            const videoLink = document.getElementById('videoLink').value;
            const videoContainer = document.getElementById('videoContainer');

            // Extract the video ID from the YouTube link
            const videoId = extractVideoId(videoLink);

            // Create and set the iframe element
            const iframe = document.createElement('iframe');
            iframe.width = '100%';
            iframe.height = '640';
            iframe.src = `https://www.youtube.com/embed/${videoId}`;
            iframe.allowfullscreen = true;

            // Clear previous content and append the iframe
            videoContainer.innerHTML = '';
            videoContainer.appendChild(iframe);
        }

        // Function to extract the video ID from a YouTube link
        function extractVideoId(link) {
            const videoIdMatch = link.match(/[?&]v=([^&#]+)/);
            return videoIdMatch && videoIdMatch[1];
        }
    </script>

@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
