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

                            <div class="font-semibold">

                                <div class="mb-6 font-semibold">
                                    <div class="grid grid-cols-1 md:grid-cols-2">

                                        <div>
                                            <label for="username"
                                                class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                                Nilai Minimum</label>
                                            <input type="number" name="username" id="inputUsername"
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Input nilai minimum untuk lulus tes sertifikasi"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <label for="username"
                                    class="text-md mb-2 block font-semibold text-gray-900 dark:text-white">
                                    List Pertanyaan </label>
                                <div class="relative overflow-x-auto">
                                    <table id="my-table"
                                        class="text-md mx-auto w-full border-x text-left font-semibold text-gray-500 shadow-md sm:rounded-lg">
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

                                            <tr class="border-b border-opacity-20 bg-white dark:border-gray-700">
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                    1
                                                </td>
                                                <td scope="row" class="px-6 py-4 text-gray-800">
                                                    Dibawah ini yang merupakan penjelasan tepat untuk Algoritma adalah:
                                                </td>
                                                <td class="px-6 py-4 text-gray-800">
                                                    A | Prosedur sistematis untuk
                                                    menyelesaikan
                                                    masalah
                                                    matematika dalam
                                                    langkah
                                                    yang terbatas, atau urutan
                                                    pengambilan keputusan yang logis untuk memecahkan masalah.
                                                </td>

                                                <td class="px-6 py-4">
                                                    <div class="item-center flex justify-center">
                                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                                            data-modal-target="defaultModal"
                                                            data-modal-toggle="defaultModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                                            data-modal-target="popup-delete"
                                                            data-modal-toggle="popup-delete">
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
                                            <tr class="border-b border-opacity-20 bg-white dark:border-gray-700">
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                    2
                                                </td>
                                                <td scope="row" class="px-6 py-4 text-gray-800">
                                                    QUESTION2
                                                </td>
                                                <td class="px-6 py-4 text-gray-800">
                                                    C | Prosedur sistematis untuk
                                                    menyelesaikan
                                                    masalah
                                                    matematika dalam
                                                    langkah
                                                    yang terbatas, atau urutan
                                                    pengambilan keputusan yang logis untuk memecahkan masalah.
                                                </td>

                                                <td class="px-6 py-4">
                                                    <div class="item-center flex justify-center">
                                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                                            data-modal-target="defaultModal"
                                                            data-modal-toggle="defaultModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                            </svg>
                                                        </div>
                                                        <div class="mr-2 w-4 transform hover:scale-110 hover:text-purple-500"
                                                            data-modal-target="popup-delete"
                                                            data-modal-toggle="popup-delete">
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
                                            <tr
                                                class="border-b border-opacity-20 bg-white hover:bg-indigo-600 hover:text-white dark:border-gray-700">
                                                <td class="px-6 py-3 text-center font-semibold" colspan="4">

                                                    <p class="inline-flex items-center align-middle"
                                                        data-modal-target="defaultModal" data-modal-toggle="defaultModal">
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
                                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambah Pertanyaan Baru (/
                                    Edit Pertanyaan kalau edit)
                                </h2>
                                <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                        {{-- Input Area --}}
                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Input Pertanyaan</label>
                                            <textarea id="myInfo"
                                                class="block h-32 w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Input Penjelasan Singkat mengenai Materi" required=""></textarea>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Pilihan Jawaban</label>
                                            <input type="text" name="username" id="inputUsername"
                                                class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Jawaban A" required="">
                                            <input type="text" name="username" id="inputUsername"
                                                class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Jawaban B" required="">
                                            <input type="text" name="username" id="inputUsername"
                                                class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Jawaban C" required="">
                                            <input type="text" name="username" id="inputUsername"
                                                class="mt-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                placeholder="Jawaban D" required="">
                                        </div>
                                        <div class="sm:col-span-1">
                                            <label for="username"
                                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                                Pilihan Jawaban Tepat</label>
                                            <select
                                                class="w-full rounded-md border-transparent bg-gray-100 px-4 py-2.5 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                                <option value="">Pilih Jawaban Yang Tepat untuk Pertanyaan</option>
                                                <option value="for-rent">A</option>
                                                <option value="for-rent">B</option>
                                                <option value="for-rent">C</option>
                                                <option value="for-rent">D</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--Footer-->
                            <div class="flex justify-end pt-2">
                                <a href="/manager/course/session/1/edit"
                                    class="mt-2 rounded-lg bg-indigo-600 p-3 px-4 text-white hover:bg-indigo-400">Buat
                                    Pertanyaan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Delete Popup --}}
            @include('modals.delete')
    </body>
    <script>
        function() {
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
