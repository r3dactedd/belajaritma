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
    <script>
        function previewImage() {
            const imageInput = document.getElementById('inputCertifImg');
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
        <form id="editTop" method="post" enctype="multipart/form-data">
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
                                <span class="mb-1 ml-2">Upload Sertifikasi Baru</span>
                            </a>

                    </div>

                </div>
            </div>
            <div class="container mx-auto my-auto w-full p-6 md:w-9/12">

                <div class="my-4 rounded-xl bg-white md:flex">
                    <!-- Left Side -->
                    <div class="w-full md:w-1/3">
                        <!-- Profile Card -->
                        <div class="h-full p-2 md:py-4 md:pl-8">
                            <div class="mx-auto w-full">
                                <img id="imagePreview" class="max-h-64 w-full p-4 md:px-0"
                                    src={{ asset('uploads/certif_images/placeholder.webp') }} alt="Image Preview" />
                            </div>
                            <div class="max-w-md">
                                <label
                                    class="text-blue border-blue hover:bg-blue flex w-48 cursor-pointer flex-col items-center rounded-lg border bg-white p-2 tracking-wide shadow-lg hover:bg-indigo-500 hover:text-white">

                                    <span class="text-base leading-normal">Unduh Foto Baru</span>
                                    <input type='file' name="certif_img" id="inputCertifImg" class="hidden"
                                        accept="image/*" onchange="previewImage()" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Right Side -->
                    <div class="h-auto w-full md:mx-2 md:w-2/3">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="rounded-xl bg-white px-6 pt-4 md:px-12">
                            <label for="username" class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                Judul Sertifikasi</label>
                            <input type="text" name="certif_title" id="inputCertifTitle"
                                class="mb-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-center text-xl text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500 md:text-left lg:text-xl"
                                placeholder="Tulis Nama Sertifikasi" required="">
                            <label for="username" class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                Deskripsi Singkat Sertifikasi</label>
                            <textarea id="myInfo" name="certif_short_desc" id="inputCertifShortDesc"
                                class="mt-focus:ring-primary-600 mb-6 block h-20 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                placeholder="Input Deskripsi Singkat mengenai Sertifikasi" required="">
                            </textarea>

                            <div class="grid-row-2 grid md:grid-cols-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto my-auto md:-mx-2 md:flex">
                    <div class="h-auto w-full md:mx-2">
                        <div class="rounded-t-xl bg-white p-4 shadow-sm">
                            <label for="username"
                                class="mb-4 ml-4 block text-base font-semibold text-gray-900 dark:text-white">
                                Mengenai Sertifikasi</label>
                            <div class="px-4 py-2 font-semibold">
                                <textarea id="myInfo" id="inputCertifDesc" name="certif_desc"
                                    class="block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Input Penjelasan Mengenai Sertifikasi, Sertifikasi Apa Yang Dipelajari, serta Tujuan Pembelajaran"
                                    required=""></textarea>
                            </div>
                        </div>
                        <div class="rounded-b-xl bg-white p-4 shadow-sm">
                            <div class="grid grid-cols-2">
                                <div>
                                    <label for="username"
                                        class="mb-4 ml-4 block text-base font-semibold text-gray-900 dark:text-white">
                                        Informasi Test</label>

                                    <div class="grid gap-4 py-4 pl-4 pr-8 md:grid-cols-1">
                                        <div class="rounded-lg bg-white p-4 shadow-md">
                                            <div class="text-indigo-500">Waktu Test (dalam menit)</div>
                                            <input type="number" id="inputCertifDuration" name="certif_duration"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="ex: 60" required="">
                                        </div>

                                        <div class="rounded-lg bg-white p-4 shadow-md">
                                            <div class="text-indigo-500">Biaya Sertifikasi (dalam Rupiah)</div>
                                            <input type="text" id="inputCertifCost" name="certif_cost"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="ex: Rp 200.000,00" required="">
                                        </div>

                                    </div>
                                </div>
                                <div>
                                    <label for="username"
                                        class="my-4 ml-4 block text-base font-semibold text-gray-900 dark:text-white">
                                        Outline Test</label>

                                    <div class="px-4 py-2 font-semibold">
                                        <textarea id="inputCertifOutline" name="certif_outline"
                                            class="block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            placeholder="Input outline materi yang terdapat dalam test sertifikasi ." required=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-4"></div>
                <h1 class="my-8 text-center text-xl font-semibold">
                    <button type="submit"
                        class= "rounded bg-indigo-500 px-4 py-2 font-bold text-white hover:bg-indigo-700">Akses Tes
                        Sertifikasi
                    </button>
                </h1>
                <div id="syllabus"class="my-4"></div>
            </div>
        </form>
    </body>
    </body>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
