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
<script>
    function previewImageASG(assignmentId) {
        const imageInput = document.getElementById('inputQuestionImg-' + assignmentId);
        const questionIMGPreview = document.getElementById('img-preview-' + assignmentId);
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                console.log('FileReader onload event fired');
                questionIMGPreview.src = e.target.result;
            };

            reader.readAsDataURL(imageInput.files[0]);
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
        <div class="bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>

                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Materi Kursus</span>
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
                        <a href="/manager/course/materiallist/{{ $material->materialToCourse->id }}">
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
            <form method="POST" action="/manager/course/session/{{ $material->id }}/edit" enctype="multipart/form-data">
                @csrf

                <div class="mx-auto my-4 md:-mx-2 md:flex">
                    <div class="h-auto w-full md:mx-2">
                        <div class="rounded-xl bg-white p-4 shadow-sm">
                            <div class="px-4 font-semibold">
                                <label for="username"
                                    class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                    Judul Materi</label>
                                <input type="text" name="title" id="inputTitle"
                                    class="mb-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-center text-lg text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500 md:text-left"
                                    placeholder="Tulis Nama Materi" required=""
                                    value="{{ htmlspecialchars($material->title) }}">
                                <label for="username"
                                    class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                    Tipe Materi</label>
                                <select name="master_type_id" id="inputType"
                                    class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2.5 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                    @foreach ($type_list as $type)
                                        <option name="master_type_id" id="inputType" value="{{ $type->id }}"
                                            {{ $material->master_type_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->master_type_name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="my-4"></div>
                            <div class="px-4 font-semibold">
                                <label for="username"
                                    class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                    Deskripsi Singkat Materi</label>
                                <textarea name="description" id="inputDescription"
                                    class="mt-focus:ring-primary-600 mb-6 block h-20 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    placeholder="Input Deskripsi Singkat mengenai Kursus" required="">{{ htmlspecialchars($material->description) }}
                            </textarea>
                            </div>
                            <div class="flex justify-end pt-2">
                                <button type="submit"
                                    class="flex items-center rounded-xl bg-indigo-500 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                                    <div class="mx-2"> Finalize Material Data</div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <div class="my-4"></div>
            <form id="" method="post" action="/manager/course/session/{{ $material->id }}/edit/detail"
                enctype="multipart/form-data">
                @csrf
                <div class="mx-auto my-auto md:-mx-2 md:flex">
                    <div class="h-auto w-full md:mx-2">
                        <div class="rounded-xl bg-white p-4 shadow-sm">
                            @if ($material->materialContentToMasterType->master_type_name == 'PDF')
                                <div class="px-4 font-semibold">
                                    <label
                                        class="text-blue border-blue hover:bg-blue flex w-48 cursor-pointer flex-col items-center rounded-lg border bg-white p-2 tracking-wide shadow-lg hover:bg-indigo-500 hover:text-white">

                                        <span class="text-base leading-normal">Upload File PDF</span>
                                        <input type='file' id="pdfInput" name="pdf_link" class="hidden" />
                                    </label>
                                    <div class="my-4"></div>
                                    <button type="submit"
                                        class="flex items-center rounded-xl bg-indigo-500 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                                        <div class="mx-2"> Finalize PDF</div>
                                    </button>

                                </div>
                            @elseif ($material->materialContentToMasterType->master_type_name == 'Video')
                                <div class="px-4 font-semibold">
                                    <label for="username"
                                        class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                        Upload Link Video</label>
                                    <input type="text" name="video_link" id="inputVideoLink"
                                        class="mt-focus:ring-primary-600 mb-6 block h-12 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500 md:w-1/2"
                                        placeholder="Isi Link Video" required="" value="{{ $material->video_link }}">
                                </div>
                                <div id="videoPreview"
                                    class="mb-3 flex items-center space-x-2 px-4 font-semibold leading-8 text-gray-900">
                                    <button onclick="embedVideo()" type="button"
                                        class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 align-middle text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-teal-800 focus:outline-none md:w-40">
                                        <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                            height="1.1em" viewBox="0 0 576 512" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                        </svg>
                                        Simpan Link
                                    </button>
                                </div>
                                <div class="flex justify-end pt-2">
                                    <button type="submit"
                                        class="flex items-center rounded-xl bg-indigo-500 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                                        <div class="mx-2"> Finalize Video</div>
                                    </button>
                                </div>
                            @elseif ($material->materialContentToMasterType->master_type_name == 'Assignment')
                                <div class="mx-auto px-4">
                                    <div class="font-semibold">
                                        <label for="username"
                                            class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">Penjelasan
                                            Assignment</label>
                                        <textarea name="detailed_description" id="inputDetDesc"
                                            class="mt-focus:ring-primary-600 mb-6 block h-20 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            placeholder="Input Deskripsi Singkat mengenai Kursus" required="">{{ htmlspecialchars($material->detailed_description) }}
                                        </textarea>
                                        <div class="mb-6 font-semibold">
                                            <div class="grid grid-cols-1 md:grid-cols-2">

                                                <div>
                                                    <label for="username"
                                                        class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                                        Nilai Minimum</label>
                                                    <input type="number" name="minimum_score" id="inputMinScore"
                                                        value="{{ $material->minimum_score }}"
                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Input nilai minimum untuk menyelesaikan assignment"
                                                        value="" required="">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex justify-end pt-2">
                                            <button type="submit"
                                                class="flex items-center rounded-xl bg-indigo-500 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                                                <div class="mx-2"> Finalize Assignment</div>
                                            </button>
                                        </div>
                                        <label for="username"
                                            class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                            List Pertanyaan </label>
                                        <div class="relative overflow-x-auto">
                                            <table
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
                                                    @foreach ($assignment_questions as $assignment)
                                                        <tr
                                                            class="border-b border-opacity-20 bg-white dark:border-gray-700">
                                                            <td scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td scope="row" class="px-6 py-4 text-gray-800">
                                                                {{ $assignment->questions }}
                                                            </td>
                                                            @if ($assignment->jawaban_benar == 'A')
                                                                <td class="px-6 py-4 text-gray-800">
                                                                    A | {{ $assignment->jawaban_a }}
                                                                </td>
                                                            @elseif ($assignment->jawaban_benar == 'B')
                                                                <td class="px-6 py-4 text-gray-800">
                                                                    B | {{ $assignment->jawaban_b }}
                                                                </td>
                                                            @elseif ($assignment->jawaban_benar == 'C')
                                                                <td class="px-6 py-4 text-gray-800">
                                                                    C | {{ $assignment->jawaban_c }}
                                                                </td>
                                                            @elseif ($assignment->jawaban_benar == 'D')
                                                                <td class="px-6 py-4 text-gray-800">
                                                                    D | {{ $assignment->jawaban_d }}
                                                                </td>
                                                            @endif

                                                            <td class="px-6 py-4">
                                                                <div class="item-center flex justify-center">
                                                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                                                        data-modal-target="modal-edit-{{ $assignment->id }}"
                                                                        data-modal-toggle="modal-edit-{{ $assignment->id }}"
                                                                        data-assignment-id="{{ $assignment->id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-red-500"
                                                                        data-modal-target="popup-delete-{{ $assignment->id }}"
                                                                        data-modal-toggle="popup-delete-{{ $assignment->id }}"
                                                                        data-assignment-id="{{ $assignment->id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
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
                                                                data-modal-target="modal-create"
                                                                data-modal-toggle="modal-create">
                                                                <svg class="mr-4 fill-black hover:fill-white"
                                                                    xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                                    viewBox="0 0 512 512">
                                                                    <path
                                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0-13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                </svg>
                                                                Buat Pertanyaan Baru
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            @elseif ($material->materialContentToMasterType->master_type_name == 'Final Test')
                                <div class="mx-auto px-4">
                                    <div class="font-semibold">
                                        <label for="username"
                                            class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                            Penjelasan Final Test</label>
                                        <textarea name="detailed_description" id="inputDetDesc"
                                            class="mt-focus:ring-primary-600 mb-6 block h-20 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            placeholder="Input Deskripsi Singkat mengenai Kursus" required="">
                                            {{ htmlspecialchars($material->detailed_description) }}
                                        </textarea>
                                        <div class="mb-6 font-semibold">
                                            <div class="grid grid-cols-1 md:grid-cols-2">

                                                <div>
                                                    <label for="username"
                                                        class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                                        Nilai Minimum</label>
                                                    <input type="number" name="minimum_score" id="inputMinScore"
                                                        value="{{ $material->minimum_score }}"
                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Input nilai minimum untuk menyelesaikan assignment"
                                                        value="" required="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex justify-end pt-2">
                                            <button type="submit"
                                                class="flex items-center rounded-xl bg-indigo-500 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                                                <div class="mx-2"> Finalize Final Test</div>
                                            </button>
                                        </div>
                                        <label for="username"
                                            class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                            List Pertanyaan </label>
                                        <div class="relative overflow-x-auto">
                                            <table
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
                                                    @foreach ($final_test_questions as $final_test)
                                                        <tr
                                                            class="border-b border-opacity-20 bg-white dark:border-gray-700">
                                                            <td scope="row"
                                                                class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td scope="row" class="px-6 py-4 text-gray-800">
                                                                {{ $final_test->questions }}
                                                            </td>
                                                            @if ($final_test->jawaban_benar == 'A')
                                                                <td class="px-6 py-4 text-gray-800">
                                                                    A | {{ $final_test->jawaban_a }}
                                                                </td>
                                                            @elseif ($final_test->jawaban_benar == 'B')
                                                                <td class="px-6 py-4 text-gray-800">
                                                                    B | {{ $final_test->jawaban_b }}
                                                                </td>
                                                            @elseif ($final_test->jawaban_benar == 'C')
                                                                <td class="px-6 py-4 text-gray-800">
                                                                    C | {{ $final_test->jawaban_c }}
                                                                </td>
                                                            @elseif ($final_test->jawaban_benar == 'D')
                                                                <td class="px-6 py-4 text-gray-800">
                                                                    D | {{ $final_test->jawaban_d }}
                                                                </td>
                                                            @endif

                                                            <td class="px-6 py-4">
                                                                <div class="item-center flex justify-center">
                                                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                                                        data-modal-target="modal-edit-final-{{ $final_test->id }}"
                                                                        data-modal-toggle="modal-edit-final-{{ $final_test->id }}"
                                                                        data-final-id="{{ $final_test->id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                        </svg>
                                                                    </div>
                                                                    <div class="mr-2 w-4 transform hover:scale-110 hover:text-red-500"
                                                                        data-modal-target="popup-final-delete-{{ $final_test->id }}"
                                                                        data-modal-toggle="popup-final-delete-{{ $final_test->id }}"
                                                                        data-final-id="{{ $final_test->id }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke="currentColor">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
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
                                                                data-modal-target="modal-create-final"
                                                                data-modal-toggle="modal-create-final">
                                                                <svg class="mr-4 fill-black hover:fill-white"
                                                                    xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                                    viewBox="0 0 512 512">
                                                                    <path
                                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0-13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                                                </svg>
                                                                Buat Pertanyaan Baru
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
            @if ($material->materialContentToMasterType->master_type_name == 'PDF')
                <div class="container mx-auto my-5 p-5">
                    <div class="no-wrap my-4 md:-mx-2 md:flex">
                        <div class="my-4"></div>
                        <div id="pdfPreviewContainer" class="hidden w-full rounded bg-white shadow md:mx-2">
                            <!-- PDF preview will be displayed here -->
                        </div>
                        @if (empty($material->pdf_link))
                            <div id="pdfExistingContainer" class="w-full rounded md:mx-2">
                                {{-- needs to be empty for sum reason --}}
                            </div>
                        @else
                            <div id="pdfExistingContainer" class="w-full rounded bg-white shadow md:mx-2">
                                <!-- PDF preview will be displayed here -->
                                <iframe src="{{ asset('uploads/material_pdf/' . $material->pdf_link) }}"
                                    type="application/pdf" width="100%" height="1024">
                                    This browser does not support PDFs. Please download the PDF to view it: <a
                                        href="{{ asset('uploads/material_pdf/' . $material->pdf_link) }}">Download
                                        PDF</a>
                                </iframe>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="container mx-auto my-5 p-5">
                    <div class="no-wrap my-4 md:-mx-2 md:flex">
                        <div class="my-4"></div>
                        <div id="videoContainer" class="container mx-auto my-5 p-5">
                            <!-- YouTube video will be embedded here -->
                        </div>
                    </div>
                </div>
            @endif

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
                                    action="/manager/course/session/{{ $material->id }}/edit/detail/create/assignments"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                        {{-- Input Area --}}
                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Input Pertanyaan</label>
                                            <textarea id="myInfo" name="questions" id="inputQuestions"
                                                class="block h-32 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Input Penjelasan Singkat mengenai Materi" required=""></textarea>
                                            <div class="my-4"></div>
                                            <label for="username"
                                                class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                                Upload Gambar (Opsional)</label>

                                            <input name="question_img" id="question_img"
                                                class="my-4 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm focus:outline-none"
                                                type="file" accept="image/*">
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="username"
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
                                        <div class="sm:col-span-1">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
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

            <div id="modal-create-final" tabindex="-1" aria-hidden="true"
                class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                <div class="z-50 mx-auto w-full overflow-y-auto rounded bg-white shadow-lg md:w-3/5">
                    <div class="overflow-y-auto px-2 py-2 text-left md:px-6">
                        <div class="container mx-auto my-5 p-5">
                            {{-- EDIT PROFILE --}}
                            <div class="flex justify-end">
                                <button type="button"
                                    class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="modal-create-final">
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
                                    (Final Test)
                                </h2>
                                <form method="POST"
                                    action="/manager/course/session/{{ $material->id }}/edit/detail/create/final"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                        {{-- Input Area --}}
                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Input Pertanyaan</label>
                                            <textarea id="myInfo" name="questions" id="inputQuestions"
                                                class="block h-32 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Input Pertanyaan Soal Disini" required=""></textarea>
                                            <div class="my-4"></div>
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Upload Gambar (Opsional)</label>
                                            <input name="question_img" id="question_img"
                                                class="my-4 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm focus:outline-none"
                                                type="file" accept="image/*">
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="username"
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
                                        <div class="sm:col-span-1">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
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

            @foreach ($assignment_questions as $assignment)
                @if (!$assignment_questions->isEmpty())
                    <div id="modal-edit-{{ $assignment->id }}" tabindex="-1" aria-hidden="true"
                        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                        <div class="z-50 mx-auto w-full overflow-y-auto rounded bg-white shadow-lg md:w-3/5">
                            <div class="overflow-y-auto px-2 py-2 text-left md:px-6">
                                <div class="container mx-auto my-5 p-5">
                                    {{-- EDIT PROFILE --}}
                                    <div class="flex justify-end">
                                        <button type="button"
                                            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-hide="modal-edit-{{ $assignment->id }}">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mx-auto rounded-xl bg-white px-2 py-2">
                                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                            Edit Pertanyaan
                                        </h2>
                                        <form method="POST" action="/manager/edit/assignments/{{ $assignment->id }}"
                                            data-assignment-id="{{ $assignment->id }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                                {{-- Input Area --}}
                                                <div class="sm:col-span-2">
                                                    <label for="username"
                                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                        Input Pertanyaan</label>
                                                    <textarea id="myInfo" name="questions" id="inputQuestions"
                                                        class="block h-32 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Input Penjelasan Singkat mengenai Materi" required="">{{ $assignment->questions }}</textarea>
                                                    <div class="my-4"></div>
                                                    <label for="username"
                                                        class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                                        Upload Gambar (Opsional)</label>
                                                    @if ($assignment->question_img)
                                                        <img src="{{ asset('uploads/asg_question_img/' . $assignment->question_img) }}"
                                                            alt="Question Image" id="img-preview-{{ $assignment->id }}"
                                                            class="mb-2 max-w-full h-auto rounded-lg border border-gray-300"
                                                            style="max-width: 150px; max-height: 150px;"
                                                            onclick="showImagePopupASG('{{ $assignment->id }}')">
                                                    @endif
                                                    <input name="question_img"
                                                        id="inputQuestionImg-{{ $assignment->id }}"
                                                        class="my-4 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm focus:outline-none"
                                                        type="file" accept="image/*"
                                                        onchange="previewImageASG('{{ $assignment->id }}')">
                                                </div>

                                                <input type="hidden" name="assignment_id"
                                                    value="{{ $assignment->id }}">
                                                <input type="hidden" name="material_id"
                                                    value="{{ $assignment->material_id }}">
                                                <div class="sm:col-span-2">
                                                    <label for="username"
                                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                        Pilihan Jawaban</label>
                                                    <input type="text" name="jawaban_a" id="inputJawabanA"
                                                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Jawaban A" value="{{ $assignment->jawaban_a }}"
                                                        required="">
                                                    <input type="text" name="jawaban_b" id="inputJawabanB"
                                                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Jawaban B" value="{{ $assignment->jawaban_b }}"
                                                        required="">
                                                    <input type="text" name="jawaban_c" id="inputJawabanC"
                                                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Jawaban C" value="{{ $assignment->jawaban_c }}"
                                                        required="">
                                                    <input type="text" name="jawaban_d" id="inputJawabanD"
                                                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Jawaban D" value="{{ $assignment->jawaban_d }}"
                                                        required="">
                                                </div>
                                                <div class="sm:col-span-1">
                                                    <label for="username"
                                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                        Pilihan Jawaban
                                                        Tepat</label>
                                                    <select name="jawaban_benar" id="inputJawabanBenar"
                                                        class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2.5 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                                        <option value="">
                                                            Pilih Jawaban Yang Tepat
                                                            untuk Pertanyaan
                                                        </option>
                                                        <option value="A"
                                                            {{ $assignment->jawaban_benar == 'A' ? 'selected' : '' }}
                                                            id="inputJawabanBenar">A</option>
                                                        <option value="B"
                                                            {{ $assignment->jawaban_benar == 'B' ? 'selected' : '' }}
                                                            id="inputJawabanBenar">B</option>
                                                        <option value="C"
                                                            {{ $assignment->jawaban_benar == 'C' ? 'selected' : '' }}
                                                            id="inputJawabanBenar">C</option>
                                                        <option value="D"
                                                            {{ $assignment->jawaban_benar == 'D' ? 'selected' : '' }}
                                                            id="inputJawabanBenar">D</option>
                                                        </option>
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
                    <div id="image-popup-{{ $assignment->id }}"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full h-full bg-gray-800 bg-opacity-75">
                        <div class="absolute transform -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                            <button type="button" onclick="hideImagePopupASG({{ $assignment->id }})"
                                class="absolute inline-flex items-center justify-center w-8 h-8 text-gray-600 bg-white rounded-full right-4 top-4 hover:bg-gray-300">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            <img src="{{ $assignment->question_img }}" alt="Question Image"
                                id="popup-image-{{ $assignment->id }}" class="max-w-full max-h-full" />
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($final_test_questions as $final_test)
                @if (!$final_test_questions->isEmpty())
                    <div id="modal-edit-final-{{ $final_test->id }}" tabindex="-1" aria-hidden="true"
                        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                        <div class="z-50 mx-auto w-full overflow-y-auto rounded bg-white shadow-lg md:w-3/5">
                            <div class="overflow-y-auto px-2 py-2 text-left md:px-6">
                                <div class="container mx-auto my-5 p-5">
                                    {{-- EDIT PROFILE --}}
                                    <div class="flex justify-end">
                                        <button type="button"
                                            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-hide="modal-edit-final-{{ $final_test->id }}">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mx-auto rounded-xl bg-white px-2 py-2">
                                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                            Edit Pertanyaan (Final Test)
                                        </h2>
                                        <form method="POST" action="/manager/edit/final/{{ $final_test->id }}"
                                            data-final-id="{{ $final_test->id }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                                {{-- Input Area --}}
                                                <div class="sm:col-span-2">
                                                    <label for="username"
                                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                        Input Pertanyaan</label>
                                                    <textarea id="myInfo" name="questions" id="inputQuestions"
                                                        class="block h-32 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Input Penjelasan Singkat mengenai Materi" required="">{{ $final_test->questions }}</textarea>
                                                    <div class="my-4"></div>
                                                    <label for="username"
                                                        class="mb-2 block text-base font-semibold text-gray-900 dark:text-white">
                                                        Upload Gambar (Opsional)</label>

                                                    <input name="question_img" id="question_img"
                                                        class="my-4 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm focus:outline-none"
                                                        type="file" accept="image/*">
                                                </div>

                                                <input type="hidden" name="final_test_id"
                                                    value="{{ $final_test->id }}">
                                                <input type="hidden" name="material_id"
                                                    value="{{ $final_test->material_id }}">
                                                <div class="sm:col-span-2">
                                                    <label for="username"
                                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                        Pilihan Jawaban</label>
                                                    <input type="text" name="jawaban_a" id="inputJawabanA"
                                                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Jawaban A" value="{{ $final_test->jawaban_a }}"
                                                        required="">
                                                    <input type="text" name="jawaban_b" id="inputJawabanB"
                                                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Jawaban B" value="{{ $final_test->jawaban_b }}"
                                                        required="">
                                                    <input type="text" name="jawaban_c" id="inputJawabanC"
                                                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Jawaban C" value="{{ $final_test->jawaban_c }}"
                                                        required="">
                                                    <input type="text" name="jawaban_d" id="inputJawabanD"
                                                        class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        placeholder="Jawaban D" value="{{ $final_test->jawaban_d }}"
                                                        required="">
                                                </div>
                                                <div class="sm:col-span-1">
                                                    <label for="username"
                                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                        Pilihan Jawaban
                                                        Tepat</label>
                                                    <select name="jawaban_benar" id="inputJawabanBenar"
                                                        class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2.5 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                                        <option value="">
                                                            Pilih Jawaban Yang Tepat
                                                            untuk Pertanyaan
                                                        </option>
                                                        <option value="A"
                                                            {{ $final_test->jawaban_benar == 'A' ? 'selected' : '' }}
                                                            id="inputJawabanBenar">A</option>
                                                        <option value="B"
                                                            {{ $final_test->jawaban_benar == 'B' ? 'selected' : '' }}
                                                            id="inputJawabanBenar">B</option>
                                                        <option value="C"
                                                            {{ $final_test->jawaban_benar == 'C' ? 'selected' : '' }}
                                                            id="inputJawabanBenar">C</option>
                                                        <option value="D"
                                                            {{ $final_test->jawaban_benar == 'D' ? 'selected' : '' }}
                                                            id="inputJawabanBenar">D</option>
                                                        </option>
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



            {{-- Delete Popup --}}
            @foreach ($final_test_questions as $final_test)
                @if (!$final_test_questions->isEmpty())
                    <div id="popup-final-delete-{{ $final_test->id }}" tabindex="-1"
                        class="fixed left-0 right-0 top-0 z-50 hidden h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                        <div class="flex min-h-screen items-center justify-center">
                            <div class="relative w-full max-w-md rounded-lg bg-white shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="popup-final-delete-{{ $final_test->id }}">
                                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin
                                        ingin
                                        menghapus pertanyaan tersebut? (Final Test)
                                    </h3>
                                    <div class="flex justify-center text-center">
                                        <form method="POST" action="/manager/delete/final/{{ $final_test->id }}"
                                            data-final_test-id="{{ $final_test->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="final_test_id" value="{{ $final_test->id }}">
                                            <button data-modal-hide="popup-final-delete-{{ $final_test->id }}"
                                                type="submit"
                                                class="mr-2 items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                                Ya, hapus
                                            </button>
                                        </form>
                                        <button data-modal-hide="popup-final-delete-{{ $final_test->id }}" type="button"
                                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-indigo-400 hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200">Tidak,
                                            batalkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($assignment_questions as $assignment)
                @if (!$assignment_questions->isEmpty())
                    <div id="popup-delete-{{ $assignment->id }}" tabindex="-1"
                        class="fixed left-0 right-0 top-0 z-50 hidden h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                        <div class="flex min-h-screen items-center justify-center">
                            <div class="relative w-full max-w-md rounded-lg bg-white shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="popup-delete-{{ $assignment->id }}">
                                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin
                                        ingin
                                        menghapus pertanyaan tersebut?
                                    </h3>
                                    <div class="flex justify-center text-center">
                                        <form method="POST" action="/manager/delete/assignments/{{ $assignment->id }}"
                                            data-assignment-id="{{ $assignment->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
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
                @endif
            @endforeach
            {{-- Delete Popup --}}
    </body>
    <script>
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
            var modalButtons = document.querySelectorAll('[data-modal-toggle="modal-edit-final"]');

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
        // Get references to the file input and preview container
        const pdfInput = document.getElementById('pdfInput');
        const pdfPreviewContainer = document.getElementById('pdfPreviewContainer');
        const pdfExistingContainer = document.getElementById('pdfExistingContainer');

        // Add an event listener to the file input to detect changes
        pdfInput.addEventListener('change', function() {
            // Check if a file is selected
            if (pdfInput.files.length > 0) {
                const file = pdfInput.files[0];

                // Check if the selected file is a PDF
                if (file.type === 'application/pdf') {
                    // Create a URL for the selected PDF
                    pdfExistingContainer.classList.add('hidden');
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
            const videoLink = document.getElementById('inputVideoLink').value;
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

        function showImagePopupASG(assignmentId) {
            var popup = document.getElementById('image-popup-' + assignmentId);
            var image = popup.querySelector('img');

            var previewImage = document.getElementById('img-preview-' + assignmentId); // Use correct ID
            var imageUrl = previewImage.src;

            image.src = imageUrl;

            popup.style.display = 'block';
        }


        function hideImagePopupASG(assignmentId) {
            var popup = document.getElementById('image-popup-' + assignmentId);

            popup.style.display = 'none';
        }
    </script>

@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
