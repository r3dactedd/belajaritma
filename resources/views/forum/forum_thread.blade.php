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
                <div class="mx-auto w-full rounded bg-white px-8 py-4 antialiased shadow">
                    <div class="mx-auto w-full rounded bg-white px-8 py-4 antialiased shadow">
                        <div class="mt-4 space-y-4">
                            {{-- FORUM CONTENT --}}
                            <div class="flex">
                                <div class="mr-3 flex-shrink-0">
                                    <img class="mt-2 h-8 w-8 rounded-full sm:h-10 sm:w-10"
                                        src={{ asset('uploads/profile_images/' . $data->formToUser->profile_img) }}
                                        alt="">
                                </div>
                                <div class="flex-1 rounded-lg px-4 pb-2 text-2xl leading-relaxed">
                                    <strong>{{ $data->forum_title }}</strong> <span
                                        class="ml-2 text-xl text-gray-400">{{ $data->created_at->format('Y-m-d') }}</span>
                                    <div class="flex">
                                        <p class="mb-3 text-sm">
                                            Created by:
                                        </p>
                                        <a class="mb-3 text-sm" href="/profile/{{ $data->formToUser->id }}">
                                            {{ $data->formToUser->username }}
                                        </a>
                                    </div>

                                    <p class="w-fit text-base mb-7" id="codeContainer">
                                    <div class="text-base mb-7">
                                        {!! $data->forum_message !!}
                                    </div>
                                    </p>
                                </div>
                            </div>
                            {{-- <div class="flex w-full items-center md:ml-16">
                            <img
                                src="https://cdn.discordapp.com/attachments/699690186761830516/1136295687810723942/image.png">
                        </div> --}}
                            {{-- FORUM CONTENT END --}}
                            {{-- ADD COMMENTS --}}
                            @if (Auth::user()->id == $data->formToUser->id)
                                <div class="mt-4 flex items-center">


                                    <button id="open-btn" data-modal-target="popup-delete" data-modal-toggle="popup-delete"
                                        class="my-4 ml-4 flex items-center rounded-md bg-red-600 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none"
                                        data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                                        Hapus Diskusi
                                    </button>
                                </div>
                            @endif

                            <hr>

                            <div class="flex w-full items-center justify-center bg-white">
                                <div class="w-full">
                                    {{-- Input --}}

                                    <form id="myForm" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <textarea id="forum_message" class="h-24" placeholder="Input Pertanyaan Anda disini."></textarea>
                                        <input type="hidden" id="replyId" name="reply_id" value="{{ $data->id }}">
                                        <input type="hidden" id="original_forum_id" name="forum_id"
                                            value="{{ $data->id }}">
                                        <input type="hidden" id="courseId" name="course_id"
                                            value="{{ $data->course_id }}">
                                        <input type="hidden" id="materialId" name="material_id"
                                            value="{{ $data->material_id }}">
                                        <input type="hidden" id="parent_id" name="parent_id" value="{{ $data->id }}">
                                        <div class="my-4 flex justify-end">
                                            <button id="get-content-button" type="submit"
                                                class="absolute w-fit rounded bg-indigo-600 px-4 py-2 text-sm font-semibold text-white">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>
                            <div class="space-y-4">
                                @foreach ($getReply as $reply)
                                    @if ($reply->reply_id == $data->id)
                                        {{-- COMMENTS LIST W/REPLY --}}
                                        @php
                                            $repliedTo = $data->formToUser->username;
                                            $repliedProfile = $data->formToUser->id;
                                        @endphp
                                        @include('forum.reply', [
                                            'reply' => $reply,
                                            'data' => $data,
                                            'repliedTo' => $repliedTo,
                                            'repliedProfile' => $repliedProfile,
                                        ])
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
        {{-- Reply Popup Modal --}}


        {{-- Reply Popup Modal --}}

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
                            menghapus forum ini?
                        </h3>
                        <div class="flex justify-center text-center">
                            {{-- <form method="POST" action="/manager/course/delete/{{ $data->id }}" data-course-id=""> --}}
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
            console.log("Hi, ini code getElementnya jalan!")
            event.preventDefault(); // Prevent the default form submission behavior
            submitForm();
        });



        function submitForm() {
            var editorContent = tinymce.get('forum_message').getContent();
            console.log("ini isian editorContent", editorContent)
            if (editorContent === '') {
                alert('Error: Pesan Tidak bisa kosong.');
                alert('Error: Pesan Tidak bisa kosong.');
                return;
            }
            var forumId = document.getElementById('original_forum_id').value;
            console.log("ini forum id asli", forumId)
            var courseId = document.getElementById('courseId').value;
            console.log("ini isian courseId", courseId)
            var replyId = document.getElementById('replyId').value;
            console.log("ini isian replyId", replyId)
            var materialId = document.getElementById('materialId').value;
            console.log("ini isian materialId", materialId);
            var parentId = document.getElementById('parent_id').value;
            console.log("ini forum id asli", parentId)


            console.log('CSRF Token:', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
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
                    console.log('Success:', data);
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
