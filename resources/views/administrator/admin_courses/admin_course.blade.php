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
                            <span class="mb-1 ml-2">Manage Kursus</span>
                        </a>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-4 pb-4">
            {{-- Search Bar --}}
            <div class="relative m-4">
                <form class="px-4 lg:px-0">
                    <label for="default-search"
                        class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="mt-10 block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            placeholder="Cari Kursus Yang Ingin Dipelajari" required>

                    </div>
                </form>
                <a href="/manager/course/create"
                    class="modal-open my-4 ml-4 flex w-fit items-center rounded-md bg-indigo-600 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                    Buat Kursus Baru
                </a>
            </div>
            {{-- Search Bar --}}

            <div class="container mx-auto w-11/12 overflow-x-auto">

                <table class="mx-auto w-full text-xs text-white">
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead class="bg-gray-200 leading-normal text-gray-600">
                        <tr class="text-md bg-gray-200 leading-normal text-gray-600 md:text-lg">
                            <th class="px-4 py-2 text-left">Nama Kursus</th>
                            <th class="px-4 py-2 text-left">Diupload Oleh</th>
                            <th class="px-4 py-2 text-left">Terakhir Diedit Oleh</th>
                            <th class="px-4 py-2 text-left">Tanggal Edit Terakhir</th>
                            <th class="px-2 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-md font-light text-gray-600 md:text-lg">
                        <tr class="border-b border-opacity-20 bg-white font-medium leading-normal text-gray-600">
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">Algoritma dan Pemrograman</p>
                            </td>
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">admin1</p>
                            </td>
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">admin2</p>
                            </td>
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">date edit</p>
                            </td>
                            <td class="px-6 py-3 text-center">
                                <div class="item-center flex justify-center">
                                    <a href="/manager/course/edit"
                                        class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                        data-modal-target="popup-delete" data-modal-toggle="popup-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-opacity-20 bg-white font-medium leading-normal text-gray-600">
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">Artificial Intelligence</p>
                            </td>
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">admin2</p>
                            </td>
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">admin2</p>
                            </td>
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">date edit</p>
                            </td>
                            <td class="px-6 py-3 text-center">
                                <div class="item-center flex justify-center">
                                    <a href="course/1/edit"
                                        class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                        data-modal-target="popup-delete" data-modal-toggle="popup-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-b border-opacity-20 bg-white font-medium leading-normal text-gray-600">
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">Data Structure</p>
                            </td>
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">admin3</p>
                            </td>
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">admin3</p>

                            </td>
                            <td class="px-4 py-2">
                                <p class="max-h-20 overflow-scroll">date edit</p>
                            </td>
                            <td class="px-6 py-3 text-center">
                                <div class="item-center flex justify-center">
                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                        data-modal-target="popup-delete" data-modal-toggle="popup-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    {{-- Delete Popup Modal --}}
    <div id="popup-delete" tabindex="-1"
        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
        <div class="relative max-h-full w-full max-w-md">
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-delete">
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
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin
                        menghapus Sesi tersebut?</h3>
                    <button data-modal-hide="popup-delete" type="button"
                        class="mr-2 inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                        Ya, hapus
                    </button>
                    <button data-modal-hide="popup-delete" type="button"
                        class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">Tidak,
                        batalkan</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete Popup Modal --}}
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
