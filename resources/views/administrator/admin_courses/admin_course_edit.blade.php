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
        <div class="scroll-smooth bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>
                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Edit Kursus</span>
                        </a>
                    </h4>

                </div>
                <form method="post" action ="/manager/course/edit/{{ $data->id }}" enctype="multipart/form-data">
                    @csrf
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

            <div class="my-4 rounded-xl bg-white md:flex">
                <!-- Left Side -->
                <div class="w-full md:w-1/3">
                    <!-- Profile Card -->
                    <div class="h-full p-2 md:py-4 md:pl-8">
                        <div class="mx-auto w-full">
                            <img id="imagePreview" class="max-h-64 w-full p-4 md:px-0"
                                src="{{ asset('uploads/course_images/' . $data->course_img) }}"alt="Course Image" />
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
                <!-- Right Side -->
                <div class="h-auto w-full md:mx-2 md:w-2/3">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="rounded-xl bg-white px-6 pt-4 md:px-12">
                        <label for="courseTitle" class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                            Judul Kursus</label>
                        <input type="text" name="course_name" id="inputCourseName"
                            class="mb-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-center text-xl text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500 md:text-left lg:text-xl"
                            value="{{ htmlspecialchars($data->course_name) }}" required="">
                        <label for="shortDesc" class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                            Deskripsi Singkat Kursus</label>
                        <textarea name="short_desc" id="inputShortDesc"
                            class="mt-focus:ring-primary-600 mb-6 block h-20 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 align-top text-sm text-gray-900 focus:border-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                            placeholder="Input Deskripsi Singkat mengenai Kursus" required=""> {{ htmlspecialchars($data->short_desc) }}
                            </textarea>

                        <div class="grid-row-2 grid md:grid-cols-2">
                            <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                <div
                                    class="mb-3 mt-4 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">

                                    <select name="level"
                                        class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                        <option value="Dasar" {{ $data->level == 'Dasar' ? 'selected' : '' }}
                                            id="inputLevelDasar">Dasar</option>
                                        <option value="Menengah" {{ $data->level == 'Menengah' ? 'selected' : '' }}
                                            id="inputLevelMenengah">Menengah</option>
                                        <option value="Mahir" {{ $data->level == 'Mahir' ? 'selected' : '' }}
                                            id="inputLevelMahir">Mahir</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-t-xl bg-white p-4 shadow-sm">
                <label for="courseDesc" class="text-md mb-4 ml-4 block font-semibold text-gray-900 dark:text-white">
                    Mengenai Kursus</label>
                <div class="px-4 py-2 font-semibold">
                    <textarea name="course_desc" id="inputCourseDesc"
                        class="block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                        placeholder="Input Penjelasan Mengenai Kursus, Materi Apa Yang Dipelajari, serta Tujuan Pembelajaran"
                        required="">{{ htmlspecialchars($data->course_desc) }}</textarea>
                </div>
            </div>
            <div class="rounded-b-xl bg-white p-4 shadow-sm">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div>
                        <label for="minSpec" class="text-md mb-4 ml-4 block font-semibold text-gray-900 dark:text-white">
                            Spesifikasi Minimum</label>

                        <div class="grid gap-4 py-4 pl-4 pr-8 md:grid-cols-2">
                            <div class="rounded-lg bg-white p-4 shadow-md">
                                <div class="text-indigo-500">Resolusi Layar</div>
                                <input type="text" name="screen_resolution" id="inputScreenRes"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    value="{{ htmlspecialchars($data->screen_resolution) }}" required="">
                            </div>
                            <div class="rounded-lg bg-white p-4 shadow-md">
                                <div class="text-indigo-500">Minimum RAM</div>
                                <input type="text" name="minimum_ram" id="inputMinRAM"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    value="{{ htmlspecialchars($data->minimum_ram) }}" required="">
                            </div>
                            <div class="rounded-lg bg-white p-4 shadow-md">
                                <div class="text-indigo-500">Processor</div>
                                <input type="text" name="processor" id="inputProcessor"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    value="{{ htmlspecialchars($data->processor) }}" required="">
                            </div>
                            <div class="rounded-lg bg-white p-4 shadow-md">
                                <div class="text-indigo-500">Operating System</div>
                                <input type="text" name="operating_system" id="inputOperatingSystem"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                    value="{{ htmlspecialchars($data->operating_system) }}"required="">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="username" class="text-md my-4 ml-4 block font-semibold text-gray-900 dark:text-white">
                            Program Lain yang Diperlukan</label>

                        <div class="px-4 py-2 font-semibold">
                            <textarea name="other_programs" id="inputOtherPrograms"
                                class="block h-40 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                placeholder="Input Tools serta Program-Program Lain yang diperlukan dalam menjalankan kursus ini." required="">{{ htmlspecialchars($data->other_programs) }}</textarea>
                        </div>
                    </div>
                    {{-- <div
                            class="mb-3 ml-4 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900">

                            <svg class="mr-2 mt-0.5 fill-white" xmlns="http://www.w3.org/2000/svg"
                                    height="1.1em" viewBox="0 0 576 512" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                            </svg>
                            <button type="submit"
                            class="absolute bottom-2.5 right-2.5 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Upload Kursus</button>
                        </div> --}}
                </div>
            </div>
            </form>
            <h1 class="my-8 text-center text-xl font-semibold">
                <a href="/manager/course/materiallist/{{ $data->id }}"
                    class= "rounded bg-indigo-500 px-4 py-2 font-bold text-white hover:bg-indigo-700">Akses Materi Kursus
                </a>
            </h1>
            {{-- PINDAHIN DAFTAR MATERI BAWAH NI KE ADMIN COURSE LIST THANKS
            <h1 class="my-8 text-center text-3xl font-semibold">Daftar Materi </h1>
            <div id="syllabus"class="my-4"></div>
            <div class="relative overflow-x-auto">
                <table
                    class="text-md mx-auto w-full text-left font-semibold text-gray-500 shadow-md sm:rounded-lg md:w-10/12">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Materi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tipe Konten
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($material as $materialItem)
                            <tr class="border-b border-opacity-20 bg-white dark:border-gray-700">

                                <td scope="row"
                                    class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                    {{ $materialItem->title }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $materialItem->materialContentToMasterType->master_type_name }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="item-center flex justify-start">
                                        <a href="/manager/course/session/{{ $materialItem->id }}/edit"
                                            class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                            data-modal-target="popup-delete" data-modal-toggle="popup-delete"
                                            data-material-id="{{ $materialItem->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                                <p class="inline-flex items-center align-middle" data-modal-target="defaultModal"
                                    data-modal-toggle="defaultModal">
                                    <svg class="mr-4 fill-black hover:fill-white" xmlns="http://www.w3.org/2000/svg"
                                        height="1.5em" viewBox="0 0 512 512">
                                        <path
                                            d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0-13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                    </svg>
                                    Buat Materi Baru
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}





            <!-- Main modal -->
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
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Buat Materi Baru</h2>
                                <form method="POST" action = "/manager/course/materiallist/{{ $courseId }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Judul Materi</label>
                                            <input type="text" name="title" id="inputTitle"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Tulis Judul untuk Materi ini " required="">
                                        </div>

                                        {{-- Input Area --}}
                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Deskripsi Singkat Materi</label>
                                            <textarea name="description" id="inputDescription"
                                                class="block h-32 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Input Penjelasan Singkat mengenai Materi" required=""></textarea>
                                        </div>

                                        <div class="sm:col-span-1">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Estimasi Waktu Penyelesaian (dalam Menit)</label>
                                            <input type="number" name="material_duration" id="inputMatDuration"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Berikan estimasi waktu penyelesaian untuk materi ini "
                                                required="">
                                        </div>
                                        <div class="sm:col-span-1">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Tipe Konten</label>
                                            <select name="master_type_id" id="inputType"
                                                class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2.5 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                                <option value="">Pilih Tipe Konten untuk Materi Ini</option>
                                                @foreach ($type_list as $type)
                                                    <option name="master_type_id" id="inputType"
                                                        value={{ $type->id }}>{{ $type->master_type_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex justify-end pt-2">
                                        <button type="submit"
                                            class="flex items-center rounded-xl bg-indigo-500 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-plus" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <line x1="12" y1="5" x2="12" y2="19" />
                                                <line x1="5" y1="12" x2="19" y2="12" />
                                            </svg>
                                            <div class="mx-2"> Buat Materi</div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!--Footer-->
                            {{-- <div class="flex justify-end pt-2">
                                <a href="/manager/course/session/1/edit"
                                    class="mt-2 rounded-lg bg-indigo-600 p-3 px-4 text-white hover:bg-indigo-400">Buat
                                    Materi</a>
                            </div> --}}
                        </div>
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
