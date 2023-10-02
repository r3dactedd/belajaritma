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
                <form>
                    <input type="text" placeholder="Cari Nama Kursus..." required=""
                        class="mt-4 w-full rounded-md border-transparent bg-gray-100 px-8 py-3 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                    <button type="submit"
                        class="absolute right-0 top-0 mt-4 rounded-r-lg border border-blue-700 bg-blue-700 p-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only font-semibold">Search</span>
                    </button>
                </form>
            </div>
            {{-- Search Bar --}}
            <div class="container mx-auto w-11/12 overflow-x-auto">
                <a href="/manager/course/create"
                    class="modal-open my-4 flex w-fit items-center rounded-md bg-indigo-600 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                    Buat Kursus Baru
                </a>
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
                            <th class="px-6 py-3 text-left">Nama Kursus</th>
                            <th class="px-6 py-3 text-left">Diupload Oleh</th>
                            <th class="px-6 py-3 text-left">Terakhir Diedit Oleh</th>
                            <th class="px-6 py-3 text-left">Tanggal Edit Terakhir</th>
                            <th class="px-2 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-md font-light text-gray-600 md:text-lg">
                        <tr class="border-b border-opacity-20 bg-white font-medium leading-normal text-gray-600">
                            <td class="px-6 py-3">
                                <p>Algoritma dan Pemrograman</p>
                            </td>
                            <td class="px-6 py-3">
                                <p>admin1</p>
                            </td>
                            <td class="px-6 py-3">
                                <p>admin2</p>
                            </td>
                            <td class="px-6 py-3">
                                <p>date edit</p>
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
                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500">
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
                            <td class="px-6 py-3">
                                <p>Artificial Intelligence</p>
                            </td>
                            <td class="px-6 py-3">
                                <p>admin2</p>
                            </td>
                            <td class="px-6 py-3">
                                <p>admin2</p>
                            </td>
                            <td class="px-6 py-3">
                                <p>date edit</p>
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
                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500">
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
                            <td class="px-6 py-3">
                                <p>Data Structure</p>
                            </td>
                            <td class="px-6 py-3">
                                <p>admin3</p>
                            </td>
                            <td class="px-6 py-3">
                                <p>admin3</p>

                            </td>
                            <td class="px-6 py-3">
                                <p>date edit</p>
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
                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500">
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
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
