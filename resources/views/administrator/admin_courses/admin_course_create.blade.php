<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />

    @vite('resources/css/app.css')
</head>


<body class="bg-gray-200 pb-12">
    <script>
        function previewImage() {
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');

            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(imageInput.files[0]);
            }
        }
    </script>
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <form id="myForm" method="post" enctype="multipart/form-data">
            @csrf
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
                        <li class="flex items-center">
                            <span
                                class="me-2 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border border-gray-500 text-xs dark:border-gray-400">
                                2
                            </span>
                            Daftar Materi Kursus
                            <svg class="ms-2 h-3 w-3 rtl:rotate-180 sm:ms-4" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                            </svg>
                        </li>
                        <li class="flex items-center">
                            <span
                                class="me-2 flex h-5 w-5 shrink-0 items-center justify-center rounded-full border border-gray-500 text-xs dark:border-gray-400">
                                3
                            </span>
                            Pengaturan Materi Kursus
                        </li>
                    </ol>
                </div>
                @if ($errors->any())
                    <div id="toast-default"
                        class="flex w-full items-center rounded-lg bg-white p-4 text-gray-500"role="alert">
                        <div>
                            <svg class="h-6 w-6 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                            </svg>
                        </div>

                        <div class="ml-3">
                            @error('course_name')
                                <div class="invalid-feedback my-1 font-bold text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('short_desc')
                                <div class="invalid-feedback my-1 font-bold text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('course_desc')
                                <div class="invalid-feedback my-1 font-bold text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('level')
                                <div class="invalid-feedback my-1 font-bold text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('screen_resolution')
                                <div class="invalid-feedback my-1 font-bold text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('minimum_ram')
                                <div class="invalid-feedback my-1 font-bold text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('processor')
                                <div class="invalid-feedback my-1 font-bold text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('operating_system')
                                <div class="invalid-feedback my-1 font-bold text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('other_programs')
                                <div class="invalid-feedback my-1 font-bold text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('course_img')
                                <div class="invalid-feedback my-1 font-bold text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <button type="button"
                            class="ms-autos -my-1.5 mx-auto ml-2 inline-flex h-8 w-8 items-center justify-center rounded-lg p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300"
                            data-dismiss-target="#toast-default" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endif
                <div class="my-4 rounded-xl bg-white md:flex">
                    <!-- Left Side -->
                    <div class="w-full md:w-1/3">
                        <!-- Profile Card -->
                        <div class="h-full p-2 md:py-4 md:pl-8">
                            <div class="mx-auto w-full">
                                <img id="imagePreview" class="max-h-64 w-full p-4 md:px-0"
                                    src={{ asset('uploads/course_images/placeholder.webp') }} alt="Image Preview" />
                            </div>
                            <div class="max-w-md">
                                <label
                                    class="text-blue border-blue hover:bg-blue flex w-48 cursor-pointer flex-col items-center rounded-lg border bg-white p-2 tracking-wide shadow-lg hover:bg-indigo-500 hover:text-white">

                                    <span class="text-base leading-normal">Unduh Foto Baru</span>
                                    <input type='file' id='imageInput' name="course_img" class="hidden" accept="image/*"
                                        onchange="previewImage()" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="h-auto w-full md:mx-2 md:w-2/3">
                        <div class="rounded-xl bg-white px-6 pt-4 md:px-12">
                            <label for="courseTitle"
                                class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                Judul Kursus</label>
                            <input type="text" name="course_name" id="inputCourseName"
                                class="mb-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-left text-xl text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500 md:text-left lg:text-xl"
                                placeholder="Tulis Nama Kursus" required="">
                            <label for="shortDesc"
                                class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                Deskripsi Singkat Kursus</label>
                            <textarea name="short_desc" id="inputShortDesc"
                                class="mt-focus:ring-primary-600 mb-6 block h-20 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                placeholder="" required=""></textarea>

                            <div class="grid-row-2 grid md:grid-cols-2">
                                <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                    <div
                                        class="mb-3 mt-4 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                        <select name="level" id="level"
                                            class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                            <option value="">Pilih Tingkat Kursus</option>
                                            <option value="Dasar" id="inputLevelDasar">Dasar</option>
                                            <option value="Menengah" id="inputLevelMenengah">Menengah</option>
                                            <option value="Mahir" id="inputLevelMahir">Mahir</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded-t-xl bg-white p-4 shadow-sm">
                    <label for="courseDesc" class="mb-4 ml-4 block text-base font-semibold text-gray-900 dark:text-white">
                        Mengenai Kursus</label>
                    <div class="px-4 py-2 font-semibold">
                        <textarea name="course_desc" id="inputCourseDesc"
                            class="block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                            placeholder="Input Penjelasan Mengenai Kursus, Materi Apa Yang Dipelajari, serta Tujuan Pembelajaran"
                            required=""></textarea>
                    </div>
                </div>
                <div class="rounded-b-xl bg-white p-4 shadow-sm">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <label for="minSpec"
                                class="mb-4 ml-4 block text-base font-semibold text-gray-900 dark:text-white">
                                Spesifikasi Minimum</label>

                            <div class="grid gap-4 py-4 pl-4 pr-8 md:grid-cols-2">
                                <div class="rounded-lg bg-white p-4 shadow-md">
                                    <div class="text-indigo-500">Resolusi Layar</div>
                                    <input type="text" name="screen_resolution" id="inputScreenRes"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="ex: 1336 x 768" required="">
                                </div>
                                <div class="rounded-lg bg-white p-4 shadow-md">
                                    <div class="text-indigo-500">Minimum RAM</div>
                                    <input type="text" name="minimum_ram" id="inputMinRAM"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="ex: 1GB " required="">
                                </div>
                                <div class="rounded-lg bg-white p-4 shadow-md">
                                    <div class="text-indigo-500">Processor</div>
                                    <input type="text" name="processor" id="inputProcessor"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="ex: Intel Celeron / Sekelas" required="">
                                </div>
                                <div class="rounded-lg bg-white p-4 shadow-md">
                                    <div class="text-indigo-500">Operating System</div>
                                    <input type="text" name="operating_system" id="inputOperatingSystem"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="ex: Linux, MacOS, dan Windows" required="">
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="username"
                                class="mb-4 ml-4 block text-base font-semibold text-gray-900 dark:text-white">
                                Program Lain yang Diperlukan</label>

                            <div class="px-4 py-2 font-semibold">
                                <textarea name="other_programs" id="inputOtherPrograms"
                                    class="block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Input Tools serta Program-Program Lain yang diperlukan dalam menjalankan kursus ini." required=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="my-8 text-center text-xl font-semibold">
                    <button type="submit"
                        class= "rounded bg-indigo-500 px-4 py-2 font-bold text-white hover:bg-indigo-700">Simpan
                    </button>
                </h1>
        </form>

        {{-- Publish Modal --}}
        <div id="popup-publish" tabindex="-1"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="relative max-h-full w-full max-w-md">
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-publish">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin
                            publish
                            test
                            kursus ini?</h3>
                        <button data-modal-hide="popup-publish" type="button"
                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">Publish</button>
                        <button data-modal-hide="popup-publish" type="button"
                            class="mr-2 inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                            Batal
                        </button>

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
