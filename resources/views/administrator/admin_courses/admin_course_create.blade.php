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
<script>
    function previewImage() {
        const input = document.getElementById('imageUpload');
        const preview = document.getElementById('imagePreview');
        const area = document.getElementById('imageUploadArea');
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                preview.classList.add('mt-4')
                area.classList.add('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

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
                            <span class="mb-1 ml-2">Upload Kursus Baru</span>
                        </a>

                </div>
                <div class="mt-6 md:mt-0">
                    <button
                        class="flex items-center rounded-xl bg-indigo-500 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        <div class="mx-2"> Publish Kursus </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto w-full p-6 md:w-9/12">
            <form id="editTop" method="post" enctype="multipart/form-data">
                @csrf
                <div class="my-4 rounded-xl bg-white md:flex">
                    <!-- Left Side -->
                    <div class="w-full md:w-1/3">
                        <!-- Profile Card -->
                        <div class="h-full rounded-xl bg-white p-2 md:py-4 md:pl-8">
                            <label>
                                <img id="imagePreview" class="hidden h-64 p-4 md:px-0" src="#" alt="Image Preview" />
                                <input type="file" class="h-0 opacity-0" id="imageUpload" onchange="previewImage()" />
                            </label>
                            <label id="imageUploadArea"
                                class="flex h-36 w-full flex-col border-4 border-dashed border-blue-200 hover:border-gray-300 hover:bg-gray-100 md:h-64">
                                <div class="flex flex-col items-center justify-center pt-7">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8 text-gray-400 group-hover:text-gray-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p
                                        class="align-center pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                        Unduh Foto Kursus</p>
                                </div>
                                <input type="file" class="h-0 opacity-0" id="imageUpload" onchange="previewImage()" />
                            </label>


                        </div>
                    </div>
                    <!-- Right Side -->
                    <div class="h-auto w-full md:mx-2 md:w-2/3">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="rounded-xl bg-white px-6 py-2 md:px-12">
                            <input type="text" name="username" id=""
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 my-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-center text-xl text-gray-900 md:text-left lg:text-xl"
                                placeholder="Tulis Nama Kursus" required="">
                            <textarea name="username" id=""
                                class="mt-focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 mb-6 block h-20 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900"
                                placeholder="Input Deskripsi Singkat mengenai Kursus" required="">
                        </textarea>
                            <div class="grid-row-2 grid md:grid-cols-2">
                                <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                    <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">

                                        <select
                                            class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                            <option value="">Pilih Tingkat Kursus</option>
                                            <option value="for-rent">Dasar</option>
                                            <option value="for-rent">Menengah</option>
                                            <option value="for-sale">Mahir</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-row items-center justify-between md:ml-8 lg:flex-col lg:items-start">
                                    <div class="mb-3 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                        <a href="#syllabus"
                                            class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 align-middle text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-teal-800 focus:outline-none md:w-40">
                                            <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                                height="1.1em" viewBox="0 0 576 512" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                            </svg>
                                            Simpan Detail [yg atas]
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="my-4"></div>
            <form id="editBottom" method="post" enctype="multipart/form-data">
                @csrf
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
                                <span class="text-xl tracking-wide">Mengenai Kursus</span>
                            </div>
                            <div class="px-4 py-2 font-semibold">
                                <textarea id="myInfo"
                                    class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                    placeholder="Input Penjelasan Mengenai Kursus, Materi Apa Yang Dipelajari, serta Tujuan Pembelajaran"
                                    required=""></textarea>
                            </div>
                        </div>
                        <div class="rounded-b-xl bg-white p-4 shadow-sm">
                            <div class="grid grid-cols-1 md:grid-cols-2">
                                <div>
                                    <div
                                        class="mb-3 ml-2 flex items-center space-x-2 font-semibold leading-8 text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                            <path
                                                d="M384 96V320H64L64 96H384zM64 32C28.7 32 0 60.7 0 96V320c0 35.3 28.7 64 64 64H181.3l-10.7 32H96c-17.7 0-32 14.3-32 32s14.3 32 32 32H352c17.7 0 32-14.3 32-32s-14.3-32-32-32H277.3l-10.7-32H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm464 0c-26.5 0-48 21.5-48 48V432c0 26.5 21.5 48 48 48h64c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H528zm16 64h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16s7.2-16 16-16zm-16 80c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H544c-8.8 0-16-7.2-16-16zm32 160a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                        </svg>
                                        <span class="text-xl tracking-wide">Spesifikasi Minimum</span>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 py-4 pl-4 pr-8">
                                        <div class="rounded-lg bg-white p-4 shadow-md">
                                            <div class="text-indigo-500">Resolusi Layar</div>
                                            <input type="text" name="username" id=""
                                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900"
                                                placeholder="ex: 1336 x 768" required="">
                                        </div>
                                        <div class="rounded-lg bg-white p-4 shadow-md">
                                            <div class="text-indigo-500">Minimum RAM</div>
                                            <input type="text" name="username" id=""
                                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900"
                                                placeholder="ex: 1GB " required="">
                                        </div>
                                        <div class="rounded-lg bg-white p-4 shadow-md">
                                            <div class="text-indigo-500">Processor</div>
                                            <input type="text" name="username" id=""
                                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900"
                                                placeholder="ex: Intel Celeron / Sekelas" required="">
                                        </div>
                                        <div class="rounded-lg bg-white p-4 shadow-md">
                                            <div class="text-indigo-500">Operating System</div>
                                            <input type="text" name="username" id=""
                                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900"
                                                placeholder="ex: Linux, MacOS, dan Windows" required="">
                                        </div>
                                    </div>
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

                                    <div class="px-4 py-2 font-semibold">
                                        <textarea id="myInfo"
                                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                            placeholder="Input Tools serta Program-Program Lain yang diperlukan dalam menjalankan kursus ini." required=""></textarea>
                                    </div>
                                </div>
                                <div
                                    class="mb-3 ml-4 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900">

                                    <a href="#syllabus"
                                        class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 align-middle text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-teal-800 focus:outline-none md:w-40">
                                        <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            height="1.1em" viewBox="0 0 576 512" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        Simpan Detail [yg bawah]
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <h1 class="my-8 text-center text-3xl font-semibold">Materi Pembelajaran </h1>
            <div id="syllabus"class="my-4"></div>

            <table class="mx-auto w-10/12 text-xs text-white">
                <colgroup>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                </colgroup>
                <thead class="bg-gray-200 leading-normal text-gray-600">
                    <tr class="text-md bg-gray-200 leading-normal text-gray-600 md:text-lg">
                        <th class="px-6 py-3 text-left">Nama Sesi</th>
                        <th class="px-6 py-3 text-left">Diupload Oleh</th>
                        <th class="px-6 py-3 text-left">Jumlah Modul</th>
                        <th class="px-2 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-md font-light text-gray-600 md:text-lg">

                    <tr
                        class="modal-open border-b border-opacity-20 bg-white font-medium leading-normal text-gray-600 hover:bg-indigo-600 hover:text-white">
                        <td class="px-6 py-3 text-center font-semibold" colspan="4">

                            <p class="inline-flex items-center align-middle">
                                <svg class="mr-4 fill-black hover:fill-white" xmlns="http://www.w3.org/2000/svg"
                                    height="1.5em" viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0-13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                </svg>
                                Buat Sesi Baru
                            </p>

                        </td>
                    </tr>

                </tbody>
            </table>

            {{-- New Session Modal --}}
            <div
                class="modal pointer-events-none fixed left-0 top-0 flex h-full w-full items-center justify-center opacity-0">
                <div class="modal-overlay absolute h-full w-full bg-gray-900 opacity-50"></div>
                <div class="modal-container z-50 mx-auto w-full overflow-y-auto rounded bg-white shadow-lg md:w-3/5">

                    <div class="modal-content overflow-y-auto px-2 py-2 text-left md:px-6">
                        <div class="container mx-auto my-5 p-5">
                            {{-- EDIT PROFILE --}}
                            <div class="flex justify-end">
                                <button type="button"
                                    class="modal-close ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-toggle="authentication-modal">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="mx-auto rounded-xl bg-white px-2 py-2">
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Buat Diskusi Baru</h2>
                                <form action="/editProfile" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                Judul Sesi</label>
                                            <input type="text" name="username" id="inputUsername"
                                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                                placeholder="Tulis Judul untuk Materi ini..." required="">
                                        </div>

                                        {{-- Input Area --}}
                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                Deskripsi Singkat Sesi</label>
                                            <textarea id="myInfo"
                                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block h-32 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                                placeholder="Input Penjelasan Singkat mengenai Sesi" required=""></textarea>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                Estimasi Waktu Penyelesaian (dalam Menit)</label>
                                            <input type="number" name="username" id="inputUsername"
                                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                                placeholder="Berikan estimasi waktu penyelesaian untuk sesi ini..."
                                                required="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--Footer-->
                            <div class="flex justify-end pt-2">
                                <a href
                                    class="modal-close mt-2 rounded-lg bg-indigo-600 p-3 px-4 text-white hover:bg-indigo-400">Buat
                                    Materi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
    <style>
        .accordion-content {
            transition: max-height 0.3s ease-out, padding 0.3s ease;
        }
    </style>

    <script>
        const accordionHeader = document.querySelectorAll(".accordion-header");
        accordionHeader.forEach((header) => {
            header.addEventListener("click", function() {
                const accordionContent = header.parentElement.querySelector(".accordion-content");
                let accordionMaxHeight = accordionContent.style.maxHeight;

                // Condition handling
                if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
                    accordionContent.style.maxHeight = `${accordionContent.scrollHeight + 32}px`;
                    header.querySelector(".fas").classList.remove("fa-plus");
                    header.querySelector(".fas").classList.add("fa-minus");
                    header.parentElement.classList.add("bg-indigo-50");
                } else {
                    accordionContent.style.maxHeight = `0px`;
                    header.querySelector(".fas").classList.add("fa-plus");
                    header.querySelector(".fas").classList.remove("fa-minus");
                    header.parentElement.classList.remove("bg-indigo-50");
                }
            });
        });

        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function(event) {
                event.preventDefault()
                toggleModal()
            })
        }

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)

        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
        }

        document.onkeydown = function(evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                toggleModal()
            }
        };



        function toggleModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }
    </script>
    </body>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
