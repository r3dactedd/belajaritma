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

    {{-- Quill for Forum --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
</head>

<body class="pb-12 bg-gray-200">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')

        <div class="px-5 bg-white scroll-smooth sm:px-10">
            <div class="container flex flex-col items-start justify-between py-6 mx-auto md:flex-row md:items-center">
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

        <div class="container p-5 mx-auto my-5">
            <div class="my-4 no-wrap md:-mx-2 md:flex">
                <div class="w-full px-8 py-4 mx-auto antialiased bg-white rounded shadow">

                    <div class="mt-4 space-y-4">
                        {{-- FORUM CONTENT --}}
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-8 h-8 mt-2 rounded-full sm:h-10 sm:w-10"
                                    src={{ asset('uploads/profile_images/' . $data->formToUser->profile_img) }}
                                    alt="">
                            </div>
                            <div class="flex-1 px-4 pb-2 text-2xl leading-relaxed rounded-lg">
                                <strong>{{ $data->forum_title }}</strong> <span
                                    class="ml-2 text-xl text-gray-400">{{ $data->created_at->format('Y-m-d') }}</span>
                                <div class="flex">
                                    <p class="my-2 text-sm">
                                        Created by:
                                    </p>
                                    <a class="my-2 text-sm" href="/profile/{{ $data->formToUser->username }}">
                                        {{ $data->formToUser->username }}
                                    </a>
                                </div>

                                <p class="mb-4 text-base w-fit" id="codeContainer">
                                <div class="text-base">
                                    {!! $data->forum_message !!}
                                </div>
                                </p>
                            </div>
                        </div>
                        {{-- FORUM CONTENT END --}}
                        {{-- ADD COMMENTS --}}
                        @if (Auth::user()->id == $data->formToUser->id)
                            <div class="flex items-center mt-4">
                                <button id="open-btn" data-modal-target="popup-delete" data-modal-toggle="popup-delete"
                                    class="flex items-center px-4 py-3 my-4 ml-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-red-600 rounded-md hover:bg-yellow-500 focus:outline-none">
                                    Hapus Diskusi
                                </button>
                            </div>
                        @elseif(auth()->user()->role_id == 1)
                            <div class="flex items-center mt-4">
                                <button id="open-btn" data-modal-target="admin-delete" data-modal-toggle="admin-delete"
                                    class="flex items-center px-4 py-3 my-4 ml-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-red-600 rounded-md hover:bg-yellow-500 focus:outline-none">
                                    Hapus Diskusi Oleh Admin
                                </button>
                            </div>
                        @endif

                        <hr>

                        <div class="flex items-center justify-center w-full bg-white">
                            <div class="w-full">
                                {{-- Input --}}

                                <form id="myForm" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <textarea id="forum_message" class="h-24" placeholder="Input Pertanyaan Anda disini."></textarea>
                                    <input type="hidden" id="replyId" name="reply_id" value="{{ $data->id }}">
                                    <input type="hidden" id="original_forum_id" name="forum_id"
                                        value="{{ $data->id }}">
                                    <input type="hidden" id="courseId" name="course_id" value="{{ $data->course_id }}">
                                    <input type="hidden" id="materialId" name="material_id"
                                        value="{{ $data->material_id }}">
                                    <input type="hidden" id="parent_id" name="parent_id" value="{{ $data->id }}">
                                    <div class="flex justify-end my-4">
                                        <button id="get-content-button" type="submit"
                                            class="absolute px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded w-fit">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>
                        <div class="space-y-4">
                            <hr class="border-gray-600">
                            @foreach ($getReply as $reply)
                                @if ($reply->reply_id == $data->id)
                                    {{-- COMMENTS LIST W/REPLY --}}
                                    @php
                                        $repliedTo = $data->formToUser->username;
                                    @endphp
                                    @include('forum.reply', [
                                        'reply' => $reply,
                                        'data' => $data,
                                        'repliedTo' => $repliedTo,
                                    ])
                                    {{-- COMMENTS LIST W/REPLY --}}
                                @endif
                                <hr class="border-gray-600">
                            @endforeach
                        </div>
                        {{-- COMMENTS LIST END --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Delete Popup Modal --}}
        <div id="popup-delete" tabindex="-1"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-delete">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg class="w-12 h-12 mx-auto mb-4 text-gray-400 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah anda yakin ingin
                            menghapus forum ini?
                        </h3>
                        <div class="flex justify-center text-center">
                            <form method="POST"
                                action="/forum/course/{{ $data->course_id }}/thread/{{ $data->id }}/delete"
                                data-course-id="">
                                @csrf
                                @method('DELETE')
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
        {{-- Delete Popup Modal --}}

        {{-- Delete Admin --}}
        <div id="admin-delete" tabindex="-1"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="admin-delete">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6">
                        <form method="POST"
                            action="/forum/course/{{ $data->course_id }}/thread/{{ $data->id }}/delete"
                            data-course-id="">
                            @csrf
                            @method('DELETE')
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Balas Forum</h2>
                            <input type="text" name="reason_delete" id="inputReasonDelete"
                                class="mb-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-center text-xl text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500 md:text-left lg:text-base"
                                placeholder="Tulis alasan hapus forum" required="">

                            <div class="flex justify-center text-center">
                                <button data-modal-hide="admin-delete" type="submit"
                                    class="mr-2 items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                    Ya, hapus
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        {{-- Delete Admin --}}
    </body>
    <style>
        .accordion-content {
            transition: max-height 0.3s ease-out, padding 0.3s ease;
        }
    </style>
    <script>
        tinymce.init({
            selector: '#forum_message',
            menubar: false,
            toolbar: ' wordcount | link image |code |bold italic underline| codesample ',
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
        document.addEventListener("DOMContentLoaded", function(event) {

            const accordionHeader = document.querySelectorAll(".accordion-header");
            accordionHeader.forEach((header) => {
                header.addEventListener("click", function() {
                    const accordionContent = header.parentElement.querySelector(
                        ".accordion-content");
                    let accordionMaxHeight = accordionContent.style.maxHeight;

                    // Condition handling
                    if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
                        accordionContent.style.maxHeight =
                            `
        $ {
            accordionContent.scrollHeight + 32
        }
        px`;
                        header.querySelector(".fas").classList.remove("fa-plus");
                        header.querySelector(".fas").classList.add("fa-minus");
                        header.parentElement.classList.add("bg-indigo-50");
                    } else {
                        accordionContent.style.maxHeight = `
        0 px`;
                        header.querySelector(".fas").classList.add("fa-plus");
                        header.querySelector(".fas").classList.remove("fa-minus");
                        header.parentElement.classList.remove("bg-indigo-50");
                    }
                });
            });
        });

        document.getElementById('myForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission behavior
            submitForm();
        });



        function submitForm() {
            var editorContent = tinymce.get('forum_message').getContent();
            if (editorContent === '') {
                alert('Error: Pesan tidak boleh kosong');
                return;
            }
            var forumId = document.getElementById('original_forum_id').value;

            var courseId = document.getElementById('courseId').value;

            var replyId = document.getElementById('replyId').value;

            var materialId = document.getElementById('materialId').value;

            var parentId = document.getElementById('parent_id').value;



            var formData = new FormData();
            formData.append('course_id', courseId);
            formData.append('reply_id', replyId);
            formData.append('material_id', materialId);
            formData.append('parent_id', forumId);
            formData.append('forum_message', editorContent);

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
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text(); // Assuming the response is text, change accordingly if it's different
                })
                .then(data => {
                    alert('Balasan forum baru berhasil dibuat!');
                    window.location.href = '/forum/course/' + courseId + '/thread/' + forumId;
                })
                .catch(error => {
                    // Handle other errors, including non-2xx status codes
                    console.error('Error:', error);
                });
        }
    </script>

@endsection

</html>
