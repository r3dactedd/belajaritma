<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    {{-- Quill for Forum --}}
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
                            <span class="mb-1 ml-2">Forum Thread</span>
                        </a>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-5 p-5">
            <div class="no-wrap my-4 md:-mx-2 md:flex">
                <div class="mx-auto rounded bg-white px-8 py-4 antialiased shadow">
                    <div class="mt-4 space-y-4">
                        {{-- FORUM CONTENT --}}
                        <div class="flex">
                            <div class="mr-3 flex-shrink-0">
                                <img class="mt-2 h-8 w-8 rounded-full sm:h-10 sm:w-10"
                                    src="{{ asset('storage/images/' . $data->formToUser->profile_img) }}" alt="">
                            </div>
                            <div class="flex-1 rounded-lg px-4 pb-2 text-2xl leading-relaxed">
                                <strong>{{ $data->forum_title }}</strong> <span
                                    class="ml-2 text-xl text-gray-400">{{ $data->created_at->format('Y-m-d') }}</span>
                                <p class="mb-5 text-sm">
                                    Created by: {{ $data->formToUser->username }}
                                </p>
                                <p class="w-fit text-base" id="codeContainer">
                                </p>
                            </div>
                        </div>
                        {{-- <div class="flex w-full items-center md:ml-16">
                            <img
                                src="https://cdn.discordapp.com/attachments/699690186761830516/1136295687810723942/image.png">
                        </div> --}}
                        {{-- FORUM CONTENT END --}}
                        {{-- ADD COMMENTS --}}
                        <div class="mt-4 flex items-center">


                            <button id="open-btn" data-modal-target="popup-delete" data-modal-toggle="popup-delete"
                                class="my-4 ml-4 flex items-center rounded-md bg-red-600 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none"
                                data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                                Hapus Diskusi
                            </button>
                        </div>

                        <div class="flex w-full items-center justify-center bg-white">
                            <div class="w-full">
                                {{-- Input --}}
                                <textarea id="input" class="h-24" placeholder="Input Pertanyaan Anda disini."></textarea>
                                <div class="my-4 flex justify-end">
                                    <button id="get-content-button"
                                        class="absolute w-fit rounded bg-indigo-600 px-4 py-2 text-sm font-semibold text-white">Kirim</button>
                                </div>
                            </div>
                        </div>
                        <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>
                        <div class="space-y-4">
                            {{-- COMMENTS LIST NO REPLY --}}
                            <div class="flex">
                                <div class="mr-3 flex-shrink-0">
                                    <img class="mt-2 h-8 w-8 rounded-full sm:h-10 sm:w-10"
                                        src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                        alt="">
                                </div>
                                <div class="flex-1 rounded-lg border px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
                                    <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                                    <p class="text-md">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                        sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                        magna aliquyam erat, sed diam voluptua.
                                    </p>
                                    <div class="transition">
                                        <div
                                            class="accordion-header flex h-12 cursor-pointer items-center space-x-5 px-2 transition">
                                            {{-- if sudah semua, add ini --}}
                                            <div class="flex -space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="0.8em"
                                                    viewBox="0 0 640 512">
                                                    <path
                                                        d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                                                </svg>
                                            </div>
                                            <a id="reply-text" data-modal-target="popup-delete"
                                                data-modal-toggle="popup-delete"
                                                class="accordion-header font-semibold text-gray-500 hover:underline">
                                                Balas
                                            </a>
                                        </div>
                                        <div class="flex-1 rounded-lg border px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
                                            <strong>{{ $reply->formToUser->username }}</strong> <span
                                                class="text-xs text-gray-400">{{ $reply->created_at->format('h:i A') }}</span>
                                            <p class="text-md">{{ strip_tags($reply->forum_message) }}</p>

                                            <div class="transition">
                                                <div
                                                    class="accordion-header flex h-12 cursor-pointer items-center space-x-5 px-2 transition">
                                                    {{-- if sudah semua, add ini --}}
                                                    <div class="flex -space-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="0.8em"
                                                            viewBox="0 0 640 512">
                                                            <path
                                                                d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                                                        </svg>
                                                    </div>
                                                    <a id="reply-text"
                                                        class="accordion-header font-semibold text-gray-500 hover:underline">
                                                        Balas
                                                    </a>
                                                </div>

                                                <div class="accordion-content max-h-0 overflow-hidden px-5 pt-0">
                                                    <ul class="ml-12 list-inside space-y-2 pb-4">
                                                        <div class="w-full" id="reply-container">

                            {{-- COMMENTS LIST W/REPLY --}}
                            <div class="flex">
                                <div class="mr-3 flex-shrink-0">
                                    <img class="mt-2 h-8 w-8 rounded-full sm:h-10 sm:w-10"
                                        src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                        alt="">
                                </div>
                                <div class="flex-1 rounded-lg border px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
                                    <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                                    <p class="text-md">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                        sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                        magna aliquyam erat, sed diam voluptua.
                                    </p>
                                    <div class="transition">
                                        <div
                                            class="accordion-header flex h-12 cursor-pointer items-center space-x-5 px-2 transition">
                                            {{-- if sudah semua, add ini --}}
                                            <div class="flex -space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="0.8em"
                                                    viewBox="0 0 640 512">
                                                    <path
                                                        d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                                                </svg>
                                            </div>
                                            <a id="reply-text" data-modal-target="popup-delete"
                                                data-modal-toggle="popup-delete"
                                                class="accordion-header font-semibold text-gray-500 hover:underline">
                                                Balas
                                            </a>
                                        </div>

                                                            <div class="my-4 flex justify-end">
                                                                <button id="get-content-button"
                                                                    class="w-fit rounded bg-indigo-600 px-4 py-2 text-sm font-semibold text-white">Kirim</button>
                                                            </div>
                                                        </div>
                                                        <a id="reply-text" data-modal-target="popup-delete"
                                                            data-modal-toggle="popup-delete"
                                                            class="accordion-header font-semibold text-gray-500 hover:underline">
                                                            Balas
                                                        </a>
                                                    </div>
                                                    <div class="accordion-content max-h-0 overflow-hidden px-5 pt-0">
                                                        <ul class="ml-12 list-inside space-y-2 pb-4">
                                                            <div class="w-full" id="destination-reply-container">
                                                                <div id="quill-container3"></div>

                                                                                    <div class="my-4 flex justify-end">
                                                                                        <button id="get-content-button"
                                                                                            class="w-fit rounded bg-indigo-600 px-4 py-2 text-sm font-semibold text-white">Kirim</button>
                                                                                    </div>
                                                                                </div>

                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    {{-- COMMENTS LIST W/REPLY --}}
                                @endif
                            @endforeach
                        </div>
                        {{-- COMMENTS LIST END --}}
                    </div>
                </div>

            </div>
        </div>
        </div>
        {{-- Delete Popup Modal --}}

        <div id="popup-delete" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="z-50 mx-auto w-full overflow-y-auto rounded bg-white shadow-lg md:w-3/5">
                <!-- Add margin if you want to see some of the overlay behind the modal-->
                <div class="modal-content overflow-y-auto px-2 py-2 text-left md:px-6">
                    <div class="container mx-auto my-5 p-5">
                        {{-- EDIT PROFILE --}}
                        <div class="flex justify-end">
                            <button type="button"
                                class="modal-close ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
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
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Balas Forum</h2>
                            <p class="text-md my-4">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                magna aliquyam erat, sed diam voluptua.
                            </p>
                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <form method="post" class="mt-2 h-32 min-h-full overflow-y-auto">
                                            <textarea id="input" class="h-24" placeholder="Input Balasan Anda disini."></textarea>
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--Footer-->
                        <div class="flex justify-end pt-2">
                            <button
                                class="modal-close mt-2 rounded-lg bg-indigo-600 p-3 px-4 text-white hover:bg-indigo-400">Balas
                                Forum</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Delete Popup Modal --}}
    </body>
    <style>
        .accordion-content {
            transition: max-height 0.3s ease-out, padding 0.3s ease;
        }
    </style>
    <script>
        //Example for input be here :
        var htmlCode =
            `Ini contoh isi reply with code example "Lorem ipsum dolor,, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<strong>herre</strong><em> consectetur adipiscing elit</em> `;

        var codeContainer = document.getElementById('codeContainer');

        // Insert the HTML code into the placeholder
        codeContainer.innerHTML = htmlCode;

        tinymce.init({
            selector: '#input',
            height: 200,
            menubar: false,
            plugins: ' code codesample image',
            toolbar: ' wordcount | link image |code |bold italic underline| codesample ',
            // Image below, for further consideration
            file_picker_types: 'image',
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener('load', () => {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'

        })
        document.addEventListener("DOMContentLoaded", function(event) {

            const accordionHeader = document.querySelectorAll(".accordion-header");
            accordionHeader.forEach((header) => {
                header.addEventListener("click", function() {
                    const accordionContent = header.parentElement.querySelector(
                        ".accordion-content");
                    let accordionMaxHeight = accordionContent.style.maxHeight;
                    const isOpen = accordionContent.style.maxHeight !== "0px";
                    accordionContent.style.maxHeight = isOpen ? "0px" :
                        `${accordionContent.scrollHeight}px`;
                    header.querySelector(".fa").classList.toggle("fa-plus", !isOpen);
                    header.querySelector(".fa").classList.toggle("fa-minus", isOpen);

                    // Condition handling
                    if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
                        accordionContent.style.maxHeight =
                            `$ { accordionContent.scrollHeight + 32 } px`;
                        header.querySelector(".fas").classList.remove("fa-plus");
                        header.querySelector(".fas").classList.add("fa-minus");
                        header.parentElement.classList.add("bg-indigo-50");
                    } else {
                        accordionContent.style.maxHeight = `0 px`;
                        header.querySelector(".fas").classList.add("fa-plus");
                        header.querySelector(".fas").classList.remove("fa-minus");
                        header.parentElement.classList.remove("bg-indigo-50");
                    }
                });
            });
        });
    </script>
    <script>
        tinymce.init({
            selector: '#forum_message',
            menubar: false,
            // Image below, for further consideration
            plugins: ' code codesample image',
            toolbar: ' wordcount | link image |code |bold italic underline| codesample ',
            // Image below, for further consideration
            file_picker_types: 'image',
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener('load', () => {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'

        })
        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            submitForm();
        });

        function showPreview() {
            var editorContent = tinymce.get('question').getContent();
            document.getElementById('preview').innerHTML = '<strong>Isi TinyMCE:</strong><br><pre>' + editorContent +
                '</pre>';
        }

        function submitForm() {
            var editorContent = tinymce.get('forum_message').getContent();
            console.log("ini isian editorContent", editorContent)
            var hasImages = editorContent.includes('<img');
            var fileInput = document.getElementById('forum_attachment');
            var courseId = document.getElementById('courseId').value;
            console.log("ini isian courseId", courseId)
            var replyId = document.getElementById('replyId').value;
            console.log("ini isian replyId", replyId)


            console.log('CSRF Token:', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            var formData = new FormData();
            formData.append('course_id', courseId);
            formData.append('forum_message', editorContent);
            formData.append('reply_id', replyId);


            // if (hasImages) {
            //     var file = fileInput.files[0];
            //     formData.append('forum_attachment', file);
            // }

            fetch('/forum/course/' + courseId + '/thread/' + replyId, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                .then(response => {
                    if (response.ok) {
                        try {
                            return response.json();
                        } catch (error) {
                            console.error('Error parsing JSON:', error);
                            return null; // or handle the error in an appropriate way
                        }
                    } else {
                        console.error('Request failed with status:', response.status);
                        return null; // or handle the error in an appropriate way
                    }
                })
                .then(data => {
                    console.log('Success:', data);
                    // Redirect to a new page using JavaScript
                    window.location.href = '/forum/course/' + courseId + '/thread/' + replyId;
                })
                .catch(error => {
                    // Handle errors, including non-JSON responses
                    console.error('Error:', error);
                });


        }
    </script>
@endsection

</html>
