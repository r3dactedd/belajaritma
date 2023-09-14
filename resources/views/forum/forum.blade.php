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
    <style>
        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
                            <span class="mb-1 ml-2">Forum [INSERT NAME COURSE]</span>
                        </a>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-5 p-5">
            <div class="no-wrap my-4 md:-mx-2 md:flex">
                <div class="my-4"></div>
                <div class="mx-auto rounded-xl bg-white px-4 py-2">
                    <div class="relative m-4">

                        <form>
                            <input type="text" placeholder="Cari Judul Diskusi..." required=""
                                class="mt-4 w-full rounded-md border-transparent bg-gray-100 px-4 py-3 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                            <button type="submit"
                                class="absolute right-0 top-0 mt-4 rounded-r-lg border border-blue-700 bg-blue-700 p-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span class="sr-only font-semibold">Search</span>
                            </button>
                        </form>
                    </div>

                    <div class="mt-4 flex items-center justify-between px-4">
                        <div class="flex">
                            <select
                                class="w-full rounded-md border-transparent bg-gray-100 px-4 py-3 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                <option value="">Filter berdasarkan Topik</option>
                                <option value="for-rent">Session 1 Name</option>
                                <option value="for-sale">Session 2 Name</option>
                                <option value="for-rent">Session 3 Name</option>
                                <option value="for-sale">Session 4 Name</option>
                            </select>

                        </div>

                        <button
                            class="rounded-md bg-gray-100 px-4 py-3 text-sm font-semibold text-gray-800 hover:bg-gray-200">
                            Reset Filter
                        </button>

                    </div>
                    <button id="open-btn"
                        class="modal-open my-4 ml-4 flex w-fit items-center rounded-md bg-indigo-600 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                        Buat Diskusi Baru
                    </button>
                    <div class="mx-auto p-6 antialiased">
                        <div class="space-y-4">
                            <!-- FORUM CONTENT -->
                            <a href="forum/1" class="flex px-2 hover:bg-gray-200">
                                <div class="mr-3 flex-shrink-0 py-2">
                                    <img class="mt-2 h-8 w-8 rounded-full sm:h-10 sm:w-10"
                                        src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                        alt="">
                                </div>
                                <div class="flex-1 rounded-lg px-4 py-2 text-2xl leading-relaxed">
                                    <strong>User Name</strong> <span class="ml-2 text-lg text-gray-400">Date Create
                                        Thread</span>
                                    <p class="text-sm">
                                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation
                                        ullamco
                                        LIMIT CHARSNYA OR SUMSHIT
                                    </p>
                                    <div class="mt-4 flex items-center">
                                        <div class="mr-2 flex -space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="0.8em" viewBox="0 0 640 512">
                                                <path
                                                    d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                                            </svg>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-500">
                                            5 Replies
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <hr>
                            <!-- FORUM CONTENT END-->
                            <a href="forum/1" class="flex px-2 hover:bg-gray-200">
                                <div class="mr-3 flex-shrink-0 py-2">
                                    <img class="mt-2 h-8 w-8 rounded-full sm:h-10 sm:w-10"
                                        src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                        alt="">
                                </div>
                                <div class="flex-1 rounded-lg px-4 py-2 text-2xl leading-relaxed">
                                    <strong>User Name</strong> <span class="ml-2 text-lg text-gray-400">Date Create
                                        Thread</span>
                                    <p class="text-sm">
                                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation
                                        ullamco
                                        LIMIT CHARSNYA OR SUMSHIT
                                    </p>
                                    <div class="mt-4 flex items-center">
                                        <div class="mr-2 flex -space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="0.8em" viewBox="0 0 640 512">
                                                <path
                                                    d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                                            </svg>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-500">
                                            5 Replies
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- CREATE FORUM MODAL --}}
        <div class="modal pointer-events-none fixed left-0 top-0 flex h-full w-full items-center justify-center opacity-0">
            <div class="modal-overlay absolute h-full w-full bg-gray-900 opacity-50"></div>
            <div class="modal-container z-50 mx-auto w-full overflow-y-auto rounded bg-white shadow-lg md:w-3/4">
                <!-- Add margin if you want to see some of the overlay behind the modal-->
                <div class="modal-content overflow-y-auto px-2 py-2 text-left md:px-6">
                    <div class="container mx-auto my-5 p-5">
                        {{-- EDIT PROFILE --}}
                        <div class="mx-auto rounded-xl bg-white px-2 py-8">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Buat Diskusi Baru</h2>
                            <form action="/editProfile" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <label for="username"
                                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                            Judul Diskusi</label>
                                        <input type="text" name="username" id="inputUsername"
                                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                            placeholder="Tulis Judul untuk Pertanyaan Anda..." required="">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="username"
                                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                            Judul Diskusi</label>
                                        <input type="text" name="username" id="inputUsername"
                                            class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                            placeholder="Tulis Pertanyaan Anda..." required="">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="username"
                                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                            Pertanyaan</label>

                                        <div id="editorcontainer" class="mt-2 h-32 min-h-full overflow-y-auto">
                                            <div id="editor" style="min-height:60%; height:auto;"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Footer-->
                        <div class="mt-8 flex justify-end pt-2">

                            <button
                                class="modal-close mt-2 rounded-lg bg-indigo-600 p-3 px-4 text-white hover:bg-indigo-400">Buat
                                Diskusi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- CREATE FORUM MODAL + QUILLJS --}}
        <script>
            var openmodal = document.querySelectorAll('.modal-open')
            for (var i = 0; i < openmodal.length; i++) {
                openmodal[i].addEventListener('click', function(event) {
                    event.preventDefault()
                    toggleModal()
                })
            }

            const overlay = document.querySelector('.modal-overlay')
            overlay.addEventListener('click', toggleModal)

            var closemodal = document.querySelectorAll('.modal-close')
            for (var i = 0; i < closemodal.length; i++) {
                closemodal[i].addEventListener('click', toggleModal)
            }

            document.onkeydown = function(evt) {
                evt = evt || window.event
                var isEscape = false
                if ("key" in evt) {
                    isEscape = (evt.key === "Escape" || evt.key === "Esc")
                } else {
                    isEscape = (evt.keyCode === 27)
                }
                if (isEscape && document.body.classList.contains('modal-active')) {
                    toggleModal()
                }
            };


            function toggleModal() {
                const body = document.querySelector('body')
                const modal = document.querySelector('.modal')
                modal.classList.toggle('opacity-0')
                modal.classList.toggle('pointer-events-none')
                body.classList.toggle('modal-active')
            }
            var quill; // Declare quill in a higher scope

            document.addEventListener("DOMContentLoaded", function(event) {
                var toolbarOptions = [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    ['image'],
                ];

                quill = new Quill('#editor', {
                    modules: {
                        syntax: false,
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });

                var quillContent = quill.root.innerHTML;

                document.getElementById('get-content-button').addEventListener('click', function() {
                    // Retrieve Quill content
                    var quillContent = quill.root.innerHTML;

                    // Perform actions with the content
                    console.log("Quill Content:");
                    console.log(quillContent); // Print content to the browser console
                });
            });
        </script>

        {{-- CREATE FORUM MODAL + QUILLJS --}}
    </body>
@endsection

</html>
