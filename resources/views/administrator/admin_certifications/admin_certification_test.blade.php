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
                            <span class="mb-1 ml-2">Akses Tes Sertifikasi</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto w-full p-6 md:w-9/12">

            <div class="my-4"></div>
            <div class="mx-auto my-auto md:-mx-2 md:flex">
                <div class="h-auto w-full md:mx-2">
                    <div class="rounded-xl bg-white p-4 shadow-sm">
                        <div class="mx-auto px-4">
                            <form action="/manager/certification/edit/test/{{ $data->id }}/set/score" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="font-semibold">
                                    <div class="mb-6 font-semibold">
                                        <div class="grid grid-cols-1 md:grid-cols-2">

                                            <div class="mx-2">
                                                <label
                                                    class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                                    Nilai Minimum</label>
                                                <input type="number" name="minimum_score" id="inputMinScore"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    value="{{ $data->minimum_score }}"
                                                    placeholder="Input nilai minimum untuk lulus tes sertifikasi"
                                                    required="">
                                                <input type="hidden" name="certification_id" value="{{ $data->id }}">
                                            </div>
                                            <div class="mx-2">
                                                <label
                                                    class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                                    Jumlah Soal</label>
                                                <input type="number" name="minimum_score" id="inputMinScore"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    value=""
                                                    placeholder="Input jumlah pertanyaan untuk tes sertifikasi"
                                                    required="">
                                                <input type="hidden" name="certification_id" >
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mt-6 md:mt-0">
                                        <button type="submit"
                                            class="flex items-center rounded-xl bg-indigo-500 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">

                                            <div class="mx-2"> Set Nilai </div>
                                        </button>
                                    </div>
                            </form>
                            <div class="my-4"></div>
                            <label class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                List Pertanyaan </label>
                            <div class="relative overflow-x-auto">
                                <table id="my-table"
                                    class="mx-auto w-full border-x text-left text-base font-semibold text-gray-500 shadow-md sm:rounded-lg">
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
                                        @foreach ($certif_questions as $certif_test)
                                            <tr class="border-b border-opacity-20 bg-white dark:border-gray-700">
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td scope="row" class="px-6 py-4 text-gray-800">
                                                    {{ $certif_test->questions }}
                                                </td>
                                                @if ($certif_test->jawaban_benar == 'A')
                                                    <td class="px-6 py-4 text-gray-800">
                                                        A | {{ $certif_test->jawaban_a }}
                                                    </td>
                                                @elseif ($certif_test->jawaban_benar == 'B')
                                                    <td class="px-6 py-4 text-gray-800">
                                                        B | {{ $certif_test->jawaban_b }}
                                                    </td>
                                                @elseif ($certif_test->jawaban_benar == 'C')
                                                    <td class="px-6 py-4 text-gray-800">
                                                        C | {{ $certif_test->jawaban_c }}
                                                    </td>
                                                @elseif ($certif_test->jawaban_benar == 'D')
                                                    <td class="px-6 py-4 text-gray-800">
                                                        D | {{ $certif_test->jawaban_d }}
                                                    </td>
                                                @endif

                                                <td class="px-6 py-4">
                                                    <div class="item-center flex justify-center">
                                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                                            data-modal-target="modal-edit-{{ $certif_test->id }}"
                                                            data-modal-toggle="modal-edit-{{ $certif_test->id }}"
                                                            data-certif_test-id="{{ $certif_test->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-red-500"
                                                            data-modal-target="popup-delete-{{ $certif_test->id }}"
                                                            data-modal-toggle="popup-delete-{{ $certif_test->id }}"
                                                            data-certif_test-id="{{ $certif_test->id }}">
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
                                        @endforeach

                                        <tr
                                            class="border-b border-opacity-20 bg-white hover:bg-indigo-600 hover:text-white dark:border-gray-700">
                                            <td class="px-6 py-3 text-center font-semibold" colspan="4">

                                                <p class="inline-flex items-center align-middle"
                                                    data-modal-target="modal-create" data-modal-toggle="modal-create">
                                                    <svg class="mr-4 fill-black hover:fill-white"
                                                        xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0-13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                    </svg>
                                                    Tambah Pertanyaan Baru
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
        <div id="modal-create" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="z-50 mx-auto w-full overflow-y-auto rounded bg-white shadow-lg md:w-3/5">
                <div class="overflow-y-auto px-2 py-2 text-left md:px-6">
                    <div class="container mx-auto my-5 p-5">
                        {{-- EDIT PROFILE --}}
                        <div class="flex justify-end">
                            <button type="button"
                                class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-hide="modal-create">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="mx-auto rounded-xl bg-white px-2 py-2">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Pertanyaan Baru
                            </h2>
                            <form method="POST"
                                action="/manager/certification/edit/test/{{ $data->id }}/create/questions"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                    {{-- Input Area --}}
                                    <div class="sm:col-span-2">
                                        <label class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                            Input Pertanyaan</label>
                                        <textarea id="myInfo" name="questions" id="inputQuestions"
                                            class="block h-32 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            placeholder="Input Penjelasan Singkat mengenai Materi" required=""></textarea>
                                        <div class="my-4"></div>
                                        <label class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                            Upload Gambar (Opsional)</label>

                                        <input name="question_img" id="question_img"
                                            class="my-4 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm focus:outline-none"
                                            type="file" accept="image/*">
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                            Pilihan Jawaban</label>
                                        <input type="text" name="jawaban_a" id="inputJawabanA"
                                            class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            placeholder="Jawaban A" required="">
                                        <input type="text" name="jawaban_b" id="inputJawabanB"
                                            class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            placeholder="Jawaban B" required="">
                                        <input type="text" name="jawaban_c" id="inputJawabanC"
                                            class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            placeholder="Jawaban C" required="">
                                        <input type="text" name="jawaban_d" id="inputJawabanD"
                                            class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            placeholder="Jawaban D" required="">
                                    </div>
                                    <div class="sm:col-span-1">
                                        <label class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                            Pilihan Jawaban Tepat</label>
                                        <select name="jawaban_benar" id="inputJawabanBenar"
                                            class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2.5 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                            <option value="">Pilih Jawaban Yang Tepat untuk Pertanyaan</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex justify-end pt-2">
                                    <button type="submit"
                                        class="mt-2 rounded-lg bg-indigo-600 p-3 px-4 text-white hover:bg-indigo-400">Buat
                                        Pertanyaan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($certif_questions as $certif_test)
            @if (!$certif_questions->isEmpty())
                <div id="modal-edit-{{ $certif_test->id }}" tabindex="-1" aria-hidden="true"
                    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                    <div class="z-50 mx-auto w-full overflow-y-auto rounded bg-white shadow-lg md:w-3/5">
                        <div class="overflow-y-auto px-2 py-2 text-left md:px-6">
                            <div class="container mx-auto my-5 p-5">
                                {{-- EDIT PROFILE --}}
                                <div class="flex justify-end">
                                    <button type="button"
                                        class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="modal-edit-{{ $certif_test->id }}">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="mx-auto rounded-xl bg-white px-2 py-2">
                                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Pertanyaan Baru
                                    </h2>
                                    <form method="POST"
                                        action="/manager/certification/edit/test/{{ $certif_test->id }}/edit/question"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                            {{-- Input Area --}}
                                            <div class="sm:col-span-2">
                                                <label
                                                    class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                    Input Pertanyaan</label>
                                                <textarea id="myInfo" name="questions" id="inputQuestions"
                                                    class="block h-32 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="Input Penjelasan Singkat mengenai Materi" required=""></textarea>
                                                <div class="my-4"></div>
                                                <label
                                                    class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                                    Upload Gambar (Opsional)</label>

                                                <input name="question_img" id="question_img"
                                                    class="my-4 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm focus:outline-none"
                                                    type="file" accept="image/*">
                                            </div>

                                            <div class="sm:col-span-2">
                                                <label
                                                    class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                    Pilihan Jawaban</label>
                                                <input type="text" name="jawaban_a" id="inputJawabanA"
                                                    class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="Jawaban A" required="">
                                                <input type="text" name="jawaban_b" id="inputJawabanB"
                                                    class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="Jawaban B" required="">
                                                <input type="text" name="jawaban_c" id="inputJawabanC"
                                                    class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="Jawaban C" required="">
                                                <input type="text" name="jawaban_d" id="inputJawabanD"
                                                    class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                    placeholder="Jawaban D" required="">
                                            </div>
                                            <input type="hidden" name="certif_test_id" value="{{ $certif_test->id }}">
                                            <input type="hidden" name="certification_id"
                                                value="{{ $certif_test->certification_id }}">
                                            <div class="sm:col-span-1">
                                                <label
                                                    class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                    Pilihan Jawaban Tepat</label>
                                                <select name="jawaban_benar" id="inputJawabanBenar"
                                                    class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2.5 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                                    <option value="">Pilih Jawaban Yang Tepat untuk Pertanyaan
                                                    </option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex justify-end pt-2">
                                            <button type="submit"
                                                class="mt-2 rounded-lg bg-indigo-600 p-3 px-4 text-white hover:bg-indigo-400">Buat
                                                Pertanyaan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        @foreach ($certif_questions as $certif_test)
            @if (!$certif_questions->isEmpty())
                <div id="popup-delete-{{ $certif_test->id }}" tabindex="-1"
                    class="fixed left-0 right-0 top-0 z-50 hidden h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                    <div class="flex min-h-screen items-center justify-center">
                        <div class="relative w-full max-w-md rounded-lg bg-white shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-delete-{{ $certif_test->id }}">
                                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
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
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin
                                    ingin
                                    menghapus pertanyaan tersebut?
                                </h3>
                                <div class="flex justify-center text-center">
                                    <form method="POST"
                                        action="/manager/certification/edit/test/{{ $certif_test->id }} /delete/question"
                                        data-certif_test-id="{{ $certif_test->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="certif_test_id" value="{{ $certif_test->id }}">
                                        <input type="hidden" name="certification_id"
                                            value="{{ $certif_test->certification_id }}">
                                        <button data-modal-hide="popup-delete-{{ $certif_test->id }}" type="submit"
                                            class="mr-2 items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                            Ya, hapus
                                        </button>
                                    </form>
                                    <button data-modal-hide="popup-delete-{{ $certif_test->id }}" type="button"
                                        class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-indigo-400 hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200">Tidak,
                                        batalkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </body>
    <script>
        function() {
            document.addEventListener('DOMContentLoaded', function() {
                var modalButtons = document.querySelectorAll('[data-modal-toggle="modal-edit"]');

                modalButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var modalId = button.getAttribute('data-modal-target');

                        var modal = document.getElementById(modalId);

                        modal.classList.toggle('hidden');
                    });
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                var modalButtons = document.querySelectorAll('[data-modal-toggle="popup-delete"]');

                modalButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var modalId = button.getAttribute('data-modal-target');

                        var modal = document.getElementById(modalId);

                        modal.classList.toggle('hidden');
                    });
                });
            });
            // Get the table and its rows
            var table = document.getElementById('my-table');
            var rows = table.rows;
            // Initialize the drag source element to null
            var dragSrcEl = null;

            // Loop through each row (skipping the first row which contains the table headers)
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i];
                // Make each row draggable
                row.draggable = true;

                // Add an event listener for when the drag starts
                row.addEventListener('dragstart', function(e) {
                    // Set the drag source element to the current row
                    dragSrcEl = this;
                    // Set the drag effect to "move"
                    e.dataTransfer.effectAllowed = 'move';
                    // Set the drag data to the outer HTML of the current row
                    e.dataTransfer.setData('text/html', this.outerHTML);
                    // Add a class to the current row to indicate it is being dragged
                    this.classList.add('bg-gray-100');
                });

                // Add an event listener for when the drag ends
                row.addEventListener('dragend', function(e) {
                    // Remove the class indicating the row is being dragged
                    this.classList.remove('bg-gray-100');
                    // Remove the border classes from all table rows
                    table.querySelectorAll('.border-t-2', '.border-blue-300').forEach(function(el) {
                        el.classList.remove('border-t-2', 'border-blue-300');
                    });
                });

                // Add an event listener for when the dragged row is over another row
                row.addEventListener('dragover', function(e) {
                    // Prevent the default dragover behavior
                    e.preventDefault();
                    // Add border classes to the current row to indicate it is a drop target
                    this.classList.add('border-t-2', 'border-blue-300');
                });

                // Add an event listener for when the dragged row enters another row
                row.addEventListener('dragenter', function(e) {
                    // Prevent the default dragenter behavior
                    e.preventDefault();
                    // Add border classes to the current row to indicate it is a drop target
                    this.classList.add('border-t-2', 'border-blue-300');
                });

                // Add an event listener for when the dragged row leaves another row
                row.addEventListener('dragleave', function(e) {
                    // Remove the border classes from the current row
                    this.classList.remove('border-t-2', 'border-blue-300');
                });

                // Add an event listener for when the dragged row is dropped onto another row
                row.addEventListener('drop', function(e) {
                    // Prevent the default drop behavior
                    e.preventDefault();
                    // If the drag source element is not the current row
                    if (dragSrcEl != this) {
                        // Get the index of the drag source element
                        var sourceIndex = dragSrcEl.rowIndex;
                        // Get the index of the target row
                        var targetIndex = this.rowIndex;
                        // If the source index is less than the target index
                        if (sourceIndex < targetIndex) {
                            // Insert the drag source element after the target row
                            table.tBodies[0].insertBefore(dragSrcEl, this.nextSibling);
                        } else {
                            // Insert the drag source element before the target row
                            table.tBodies[0].insertBefore(dragSrcEl, this);
                        }
                    }
                    // Remove the border classes from all table rows
                    table.querySelectorAll('.border-t-2', '.border-blue-300').forEach(function(el) {
                        el.classList.remove('border-t-2', 'border-blue-300');
                    });
                });
            }
        })();
    </script>

@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
