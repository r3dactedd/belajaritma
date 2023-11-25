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
        <div class="scroll-smooth bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>
                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Edit Sertifikasi</span>
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
                        <div class="mx-2"> Finalize Sertifikasi </div>
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
                        <div class="h-full p-2 md:py-4 md:pl-8">
                            <div class="mx-auto w-full">
                                <img id="imagePreview" class="max-h-64 w-full p-4 md:px-0"
                                    src="/storage/image/placeholder.webp" alt="Image Preview" />
                            </div>
                            <div class="max-w-md">
                                <label
                                    class="text-blue border-blue hover:bg-blue flex w-48 cursor-pointer flex-col items-center rounded-lg border bg-white p-2 tracking-wide shadow-lg hover:bg-indigo-500 hover:text-white">

                                    <span class="text-base leading-normal">Unduh Foto Baru</span>
                                    <input type='file' name="certif_img" id="inputCertifImg" class="hidden" accept="image/*"
                                        onchange="previewImage()" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Right Side -->
                    <div class="h-auto w-full md:mx-2 md:w-2/3">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="rounded-xl bg-white px-6 pt-4 md:px-12">
                            <label for="username" class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                Judul Sertifikasi</label>
                            <input type="text"  name="certif_title" id="inputCertifTitle"
                                class="mb-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-center text-xl text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500 md:text-left lg:text-xl"
                                value="{{ htmlspecialchars($data->certif_title) }}" required="">
                            <label for="username" class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                Deskripsi Singkat Sertifikasi</label>
                            <textarea id="myInfo" name="certif_short_desc" id="inputCertifShortDesc"
                                class="mt-focus:ring-primary-600 mb-6 block h-20 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                placeholder="Input Deskripsi Singkat mengenai Sertifikasi" required=""> {{ htmlspecialchars($data->certif_short_desc) }}
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
                                class="text-md mb-4 ml-4 block font-semibold text-gray-900 dark:text-white">
                                Mengenai Sertifikasi</label>
                            <div class="px-4 py-2 font-semibold">
                                <textarea id="myInfo" id="inputCertifDesc" name="certif_desc"
                                    class="block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    required=""> {{ htmlspecialchars($data->certif_desc) }}</textarea>
                            </div>
                        </div>
                        <div class="rounded-b-xl bg-white p-4 shadow-sm">
                            <div class="grid grid-cols-2">
                                <div>
                                    <label for="username"
                                        class="text-md mb-4 ml-4 block font-semibold text-gray-900 dark:text-white">
                                        Informasi Test</label>

                                    <div class="grid gap-4 py-4 pl-4 pr-8 md:grid-cols-1">
                                        <div class="rounded-lg bg-white p-4 shadow-md">
                                            <div class="text-indigo-500">Waktu Test (dalam menit)</div>
                                            <input type="number" id="inputCertifDuration" name="certif_duration"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                value={{ ($data->certif_duration) }} required="">
                                        </div>

                                        <div class="rounded-lg bg-white p-4 shadow-md">
                                            <div class="text-indigo-500">Biaya Sertifikasi (dalam Rupiah)</div>
                                            <input type="text" id="inputCertifCost" name="certif_cost"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                value={{($data->certif_cost)}} required="">
                                        </div>

                                    </div>
                                </div>
                                <div>
                                    <label for="username"
                                        class="text-md my-4 ml-4 block font-semibold text-gray-900 dark:text-white">
                                        Outline Test</label>

                                    <div class="px-4 py-2 font-semibold">
                                        <textarea id="inputCertifOutline" name="certif_outline"
                                            class="block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            required="">
                                            {{ htmlspecialchars($data->certif_outline) }}
                                        </textarea>
                                    </div>
                                </div>
                                <button type="submit"
                                    class= "rounded bg-indigo-500 px-4 py-2 font-bold text-white hover:bg-indigo-700">Edit Sertifikasi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="my-4"></div>

            <div id="syllabus"class="my-4"></div>
            <div class="relative overflow-x-auto">
                <table
                    class="text-md mx-auto w-full text-left font-semibold text-gray-500 shadow-md sm:rounded-lg md:w-10/12">
                    <tbody>
                        <tr
                            class="border-b border-opacity-20 bg-white hover:bg-indigo-600 hover:text-white dark:border-gray-700">
                            <td class="px-6 py-3 text-center font-semibold" colspan="4">
                                <a class="block" href="/manager/certification/edit/test">
                                    <p class="inline-flex items-center align-middle" data-modal-target="defaultModal"
                                        data-modal-toggle="defaultModal">
                                        <svg class="mr-4 fill-black hover:fill-white" xmlns="http://www.w3.org/2000/svg"
                                            height="1.5em" viewBox="0 0 512 512">
                                            <path
                                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0-13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                        </svg>
                                        Akses Tes Sertifikasi
                                    </p>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </body>

@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
