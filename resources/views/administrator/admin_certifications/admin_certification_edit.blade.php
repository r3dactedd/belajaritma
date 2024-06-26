<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
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
                            <a href="/manager/certification" class="flex items-center" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                                </svg>
                                <span class="mb-1 ml-2">Edit Sertifikasi</span>
                            </a>

                    </div>
                    <div class="mt-6 md:mt-0">
                        <button type="submit"
                            class="flex items-center rounded-xl bg-indigo-500 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">

                            <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512">
                                <path fill="#ffffff"
                                    d="M48 96V416c0 8.8 7.2 16 16 16H384c8.8 0 16-7.2 16-16V170.5c0-4.2-1.7-8.3-4.7-11.3l33.9-33.9c12 12 18.7 28.3 18.7 45.3V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H309.5c17 0 33.3 6.7 45.3 18.7l74.5 74.5-33.9 33.9L320.8 84.7c-.3-.3-.5-.5-.8-.8V184c0 13.3-10.7 24-24 24H104c-13.3 0-24-10.7-24-24V80H64c-8.8 0-16 7.2-16 16zm80-16v80H272V80H128zm32 240a64 64 0 1 1 128 0 64 64 0 1 1 -128 0z" />
                            </svg>
                            <div class="mx-2"> Simpan Perubahan Data </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="container mx-auto my-auto w-full p-6 md:w-9/12">
                @if ($errors->any())
                    <div id="toast-default"
                        class="flex w-fit items-center rounded-lg bg-white p-4 text-gray-500"role="alert">
                        <div>
                            <svg class="h-6 w-6 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                            </svg>
                        </div>

                        <div class="ml-3">
                            @error('certif_title')
                                <div class="invalid-feedback my-1 text-sm text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('certif_short_desc')
                                <div class="invalid-feedback my-1 text-sm text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('certif_desc')
                                <div class="invalid-feedback my-1 text-sm text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('certif_duration')
                                <div class="invalid-feedback my-1 text-sm text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('certif_cost')
                                <div class="invalid-feedback my-1 text-sm text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('certif_outline')
                                <div class="invalid-feedback my-1 text-sm text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('certif_img')
                                <div class="invalid-feedback my-1 text-sm text-red-500">
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

                        <div class="h-full p-2 md:py-4 md:pl-8">
                            <div class="mx-auto w-full">
                                <img id="imagePreview" class="max-h-64 w-full p-4 md:px-0"
                                    src={{ asset('uploads/certif_images/' . $data->certif_img) }} alt="Image Preview" />
                            </div>
                            <div class="max-w-md">
                                <label
                                    class="text-blue border-blue hover:bg-blue flex w-48 cursor-pointer flex-col items-center rounded-lg border bg-white p-2 tracking-wide shadow-lg hover:bg-indigo-500 hover:text-white">

                                    <span class="text-base leading-normal">Unduh Foto</span>
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
                            <label class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                Judul Sertifikasi</label>
                            <input type="text" name="certif_title" id="inputCertifTitle"
                                class="mb-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-center text-xl text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500 md:text-left lg:text-xl"
                                value="{{ htmlspecialchars($data->certif_title) }}" required="">
                            <label class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
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
                            <label class="mb-4 ml-4 block text-base font-semibold text-gray-900 dark:text-white">
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
                                    <label class="mb-4 ml-4 block text-base font-semibold text-gray-900 dark:text-white">
                                        Informasi Test</label>

                                    <div class="grid gap-4 py-4 pl-4 pr-8 md:grid-cols-1">
                                        <div class="rounded-lg bg-white p-4 shadow-md">
                                            <div class="text-indigo-500">Waktu Test (dalam menit)</div>
                                            <input type="number" id="inputCertifDuration" name="certif_duration"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                value={{ $data->certif_duration }} required="">
                                        </div>

                                        <div class="rounded-lg bg-white p-4 shadow-md">
                                            <div class="text-indigo-500">Biaya Sertifikasi (dalam Rupiah)</div>
                                            <input type="text" id="inputCertifCost" name="certif_cost"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                value={{ $data->certif_cost }} required="">
                                        </div>

                                    </div>
                                </div>
                                <div>
                                    <label class="mb-4 ml-4 block text-base font-semibold text-gray-900 dark:text-white">
                                        Kompetensi Sertifikasi</label>

                                    <div class="px-4 py-2 font-semibold">
                                        <textarea id="inputCertifOutline" name="certif_outline"
                                            class="block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            required="">{{ htmlspecialchars($data->certif_outline) }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-4"></div>
                <div class="flex justify-center">
                    <h1 class="mx-8 my-8 text-center text-xl font-semibold">
                        <a href="/manager/certification/edit/test/{{ $data->id }}"
                            class="rounded bg-indigo-500 px-4 py-2 font-bold text-white hover:bg-indigo-700">Akses Tes
                            Sertifikasi
                        </a>
                    </h1>
                    @if ($data->ready_for_publish == 1)
                        <h1 class="mx-8 my-8 text-center text-xl font-semibold">
                            <a data-modal-target="popup-unpublish" data-modal-toggle="popup-unpublish"
                                class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-indigo-700">
                                Unpublish Sertifikasi
                            </a>
                        </h1>
                    @elseif ($data->ready_for_publish == 0 && $data->certifToCertifQuestion->count() > 0)
                        <h1 class="mx-8 my-8 text-center text-xl font-semibold">
                            <a data-modal-target="popup-publish" data-modal-toggle="popup-publish"
                                class="rounded bg-green-500 px-4 py-2 font-bold text-white hover:bg-green-700">
                                Publish Sertifikasi
                            </a>
                        </h1>
                    @elseif ($data->certifToCertifQuestion->isEmpty() || $data->certifToCertifQuestion->count() == 0)
                        <h1 class="mx-8 my-8 text-center text-xl font-semibold">
                            <a data-modal-target="popup-no-certif-test" data-modal-toggle="popup-no-certif-test"
                                class="rounded bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-700">
                                Publish Sertifikasi
                            </a>
                        </h1>
                    @endif
                </div>
                <div id="syllabus"class="my-4"></div>

        </form>
    </body>

    <div id="popup-no-certif-test" tabindex="-1"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
        <div class="relative max-h-full w-full max-w-md">
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-no-certif-test">
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
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Sertifikasi Tidak Dapat Di
                        Publish!!</h3>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"><strong>**Sertifikasi Wajib
                            Mempunyai Pertanyaan**</strong></h3>
                </div>
            </div>
        </div>
    </div>

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
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda yakin
                        ingin
                        publish sertifikasi ini?</h3>
                    <div class="flex justify-center text-center">
                        <form method="POST" action="/publishCertif/{{ $data->id }}"
                            data-course-id="{{ $data->id }}">
                            @csrf
                            <button type="submit"
                                class="mr-2 items-center rounded-lg bg-green-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800">
                                Ya, publish
                            </button>
                        </form>
                        <button type="button"
                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-indigo-400 hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200"
                            data-modal-hide="popup-publish">
                            Tidak, batalkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="popup-unpublish" tabindex="-1"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
        <div class="relative max-h-full w-full max-w-md">
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-unpublish">
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
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda yakin
                        ingin
                        unpublish sertifikasi ini?</h3>
                    <div class="flex justify-center text-center">
                        <form method="POST" action="/unpublishCertif/{{ $data->id }}"
                            data-course-id="{{ $data->id }}">
                            @csrf
                            <button type="submit"
                                class="mr-2 items-center rounded-lg bg-red-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                Ya, unpublish
                            </button>
                        </form>
                        <button type="button"
                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-indigo-400 hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200"
                            data-modal-hide="popup-unpublish">
                            Tidak, batalkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
