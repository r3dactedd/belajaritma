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
    <style>
        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>

</head>

@php
    use Illuminate\Support\Str;
@endphp

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
                            <span class="mb-1 ml-2">Forum {{ $course->course_name }}</span>
                        </a>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-5 p-5">
            <div class="no-wrap my-4 md:-mx-2 md:flex">
                <div class="my-4"></div>
                <div class="mx-auto w-full rounded-xl bg-white px-4 py-2">
                    <div class="relative mt-4 lg:px-4">
                        <form action="/forum/course/{{ $course->id }}" method="get" class="px-4 lg:px-0">
                            @csrf
                            <label for="default-search"
                                class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">Search</label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <input type="search" name="searchKeyword" id="inputKeyword"
                                    class="mt-10 block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 pl-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                    placeholder="Cari Judul Diskusi Forum">
                            </div>

                    </div>

                    <div class="mt-4 flex items-center justify-between px-4">
                        <div class="flex">
                            <select name="selectedMaterial"
                                class="w-full rounded-md border-transparent bg-gray-100 px-4 py-3 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                <option value="">Filter Forum</option>
                                @foreach ($materials as $forum_material)
                                    <option value="{{ $forum_material->title }}">{{ $forum_material->title }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="flex w-fit items-center rounded border border-gray-200 px-4 pl-4 dark:border-gray-700">
                            <input id="bordered-checkbox-1" type="checkbox" value="" name="bordered-checkbox"
                                class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600">
                            <label for="bordered-checkbox-1"
                                class="mx-4 w-full py-4 text-sm font-medium text-gray-900 dark:text-gray-300">Hanya
                                Tampilkan Diskusi Saya</label>
                        </div>
                    </div>
                    </form>

                    <button id="open-btn"
                        class="my-4 ml-4 flex w-fit items-center rounded-md bg-indigo-600 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none"
                        data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                        Buat Diskusi Baru
                    </button>
                    <div class="mx-auto px-2 py-4 antialiased">
                        <div class="space-y-4">
                            @foreach ($forums as $forumData)
                                @if ($forumData->forum_title != null)
                                    <!-- FORUM CONTENT -->
                                    <a href="/forum/course/{{ $forumData->course_id }}/thread/{{ $forumData->id }}"
                                        class="flex px-2 hover:bg-gray-200">
                                        <div class="mr-3 flex-shrink-0 py-2">
                                            <img class="mt-2 h-8 w-8 rounded-full sm:h-10 sm:w-10"
                                                src="{{ asset('uploads/profile_images/' . $forumData->formToUser->profile_img) }}"
                                                alt="">
                                        </div>
                                        <div class="flex-1 rounded-lg px-4 py-2 text-2xl leading-relaxed">
                                            <strong>{{ $forumData->forum_title }}</strong> <span
                                                class="ml-2 text-lg text-gray-400">
                                                {{ $forumData->created_at->format('Y-m-d') }}
                                            </span>
                                            <p class="mb-5 text-sm">
                                                Created by: {{ $forumData->formToUser->username }}
                                            </p>
                                            <p class="text-sm">
                                                {{ Str::limit(strip_tags($forumData->forum_message), 50) }}
                                            </p>
                                            <div class="mt-4 flex items-center">
                                                <div class="mr-2 flex -space-x-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="0.8em"
                                                        viewBox="0 0 640 512">
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
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
            <div class="z-50 mx-auto w-full overflow-y-auto rounded bg-white shadow-lg md:w-3/5">
                <!-- Add margin if you want to see some of the overlay behind the modal-->
                <div class="modal-content overflow-y-auto px-2 py-2 text-left md:px-6">
                    <div class="container mx-auto my-5 p-5">

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
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Buat Diskusi Baru</h2>
                            <form id="myForm" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <label for="forum_title"
                                            class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                            Judul Diskusi</label>
                                        <input type="text" name="forum_title" id="forum_title"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            placeholder="Tulis Judul untuk Diskusi Anda " required="">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="material_id"
                                            class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                            Pilih Materi</label>
                                        <select id="material_id" name="material_id"
                                            class="w-full rounded-md border-transparent bg-gray-50 px-4 py-3 text-sm font-semibold focus:border-gray-500 focus:bg-white focus:ring-0">
                                            <option value="">Pilih Materi</option>
                                            @foreach ($materials as $material)
                                                <option value="{{ $material->id }}">{{ $material->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="forum_message"
                                            class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                            Pertanyaan
                                        </label>

                                        <textarea id="forum_message" name="forum_message" placeholder="Input Pertanyaan Anda disini."></textarea>

                                        <input type="hidden" id="courseId" name="course_id"
                                            value="{{ count($forums) > 0 ? $forums[0]['course_id'] : '' }}">


                                    </div>

                                    <div class="flex justify-start pt-2">
                                        <button type="submit"
                                            class="modal-close mt-2 rounded-lg bg-indigo-600 p-3 px-4 text-white hover:bg-indigo-400">Buat
                                            Diskusi</button>
                                    </div>
                                </div>
                            </form>

                            <div id="preview">
                                <!-- Tempat untuk menampilkan hasil preview -->
                            </div>
                        </div>
                        <!--Footer-->

                    </div>
                </div>
            </div>
        </div>

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
                event.preventDefault(); // Menghentikan perilaku bawaan formulir
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
                if (editorContent === '') {
                    alert('Error: Forum message cannot be empty.');
                    return;
                }
                var hasImages = editorContent.includes('<img');
                var fileInput = document.getElementById('forum_attachment');
                var courseId = document.getElementById('courseId').value;
                console.log("ini isian courseId", courseId)
                var discussionTitle = document.getElementById('forum_title').value;
                console.log("ini isian discussionTitle", discussionTitle)
                var materialId = document.getElementById('material_id').value;
                console.log("ini isian materialId", materialId);

                console.log('CSRF Token:', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                var formData = new FormData();
                formData.append('course_id', courseId);
                formData.append('material_id', materialId);
                formData.append('forum_title', discussionTitle);
                formData.append('forum_message', editorContent);


                if (hasImages) {
                    var file = fileInput.files[0];
                    formData.append('forum_attachment', file);
                }

                fetch('/forum/course/' + courseId, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            // Include any necessary headers, such as CSRF token
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    })
                    .then(response => {
                        if (response.ok) {
                            alert('Success! Your form has been uploaded.');
                            // If the response status is in the range of 200 to 299, treat it as successful
                            window.location.href = '/forum/course/' + courseId; // Redirect to the desired URL
                        } else {
                            // If the response status indicates an error, handle it
                            console.error('Error:', response.statusText);
                            // You can display an error message to the user or take other appropriate actions
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Handle other types of errors, such as network issues
                    });


            }
        </script>

    </body>
@endsection

</html>
