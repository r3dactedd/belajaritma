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
                                <button type="submit"
                                    class="absolute bottom-2.5 right-2.5 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
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
                                class="mx-2 w-full py-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hanya Tampilkan Diskusi Saya</label>
                        </div>
                    </div>
                    </form>

                    <button id="open-btn"
                        class="my-4 ml-4 flex w-fit items-center rounded-md bg-indigo-600 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none"
                        data-modal-target="defaultModal" data-modal-toggle="defaultModal">
                        Buat Diskusi Baru
                    </button>

                    @foreach ($forums as $forumData)
                        @if ($forumData->forum_title != null)
                            @if ($forumData->deleted_by_admin == 0)
                                <div class="rounded-lg bg-white p-6 text-base dark:bg-gray-900">
                                    <footer class="mb-2 flex items-center justify-between">
                                        <div class="flex items-center">
                                            <p
                                                class="mr-3 inline-flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                                                <img class="mr-2 h-8 w-8 rounded-full"
                                                    src="{{ asset('uploads/profile_images/' . $forumData->formToUser->profile_img) }}"
                                                    alt=""><a class="hover:underline"
                                                    href="/profile/{{ $forumData->formToUser->username }}">{{ $forumData->formToUser->username }}</a>
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                                    datetime="2022-02-08"
                                                    title="February 8th, 2022">{{ $forumData->created_at->format('Y-m-d') }}</time>
                                            </p>
                                        </div>
                                    </footer>
                                    <div class="px-2 hover:bg-gray-200">
                                        <a href="/forum/course/{{ $forumData->course_id }}/thread/{{ $forumData->id }}">
                                            <p class="mb-2 flex text-xl"><strong>{{ $forumData->forum_title }}</strong>

                                                <p class="mt-2 text-gray-500 dark:text-gray-400">
                                                    {{ Str::limit(strip_tags($forumData->forum_message), 30) }}</p>

                                                <div class="mt-4 flex items-center px-2">
                                                    <div class="mr-2 flex space-x-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                            viewBox="0 0 640 512">
                                                            <path
                                                                d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                                                        </svg>
                                                    </div>

                                                    @php
                                                        $parent = $forumData->id;
                                                        $getTotalReplies = 0;
                                                        foreach ($forums as $forum) {
                                                            if ($parent == $forum->parent_id) {
                                                                $getTotalReplies += 1;
                                                            }
                                                        }
                                                    @endphp

                                                    <p class="text-sm font-semibold text-gray-500 hover:underline">
                                                        {{ $getTotalReplies }} Replies
                                                    </p>
                                                    <div class="mx-2 flex space-x-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><path d="M3.9 54.9C10.5 40.9 24.5 32 40 32H472c15.5 0 29.5 8.9 36.1 22.9s4.6 30.5-5.2 42.5L320 320.9V448c0 12.1-6.8 23.2-17.7 28.6s-23.8 4.3-33.5-3l-64-48c-8.1-6-12.8-15.5-12.8-25.6V320.9L9 97.3C-.7 85.4-2.8 68.8 3.9 54.9z"/></svg>
                                                    </div>
                                                    <p class="text-sm font-semibold text-gray-500 hover:underline">
                                                        Insert Session Name here
                                                    </p>
                                                </div>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            @elseif ($forumData->deleted_by_admin == 1)
                                <div class="rounded-lg bg-white p-6 text-base dark:bg-gray-900">
                                    <footer class="mb-2 flex items-center justify-between">
                                        <div class="flex items-center">
                                            <p
                                                class="mr-3 inline-flex items-center text-sm font-semibold text-gray-900 dark:text-white">
                                                <img class="mr-2 h-8 w-8 rounded-full"
                                                    src="{{ asset('uploads/profile_images/' . $forumData->formToUser->profile_img) }}"
                                                    alt=""><a class="hover:underline"
                                                    href="/profile/{{ $forumData->formToUser->username }}">{{ $forumData->formToUser->username }}</a>
                                            </p>
                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                                    datetime="2022-02-08"
                                                    title="February 8th, 2022">{{ $forumData->created_at->format('Y-m-d') }}</time>
                                            </p>
                                        </div>
                                    </footer>
                                    <div class="px-2 hover:bg-gray-200">
                                        <a>
                                            <p class="mb-2 flex text-xl"><strong>{{ $forumData->forum_title }}</strong>
                                                <p class="mt-2 text-gray-500 dark:text-gray-400">
                                                    {{ Str::limit(strip_tags($forumData->forum_message), 50) }}</p>

                                                <div class="mt-4 flex items-center px-2">
                                                    <div class="mr-2 flex space-x-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                            viewBox="0 0 640 512">
                                                            <path
                                                                d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                                                        </svg>
                                                    </div>

                                                    @php
                                                        $parent = $forumData->id;
                                                        $getTotalReplies = 0;
                                                        foreach ($forums as $forum) {
                                                            if ($parent == $forum->parent_id) {
                                                                $getTotalReplies += 1;
                                                            }
                                                        }
                                                    @endphp

                                                    <p class="text-sm font-semibold text-gray-500 hover:underline">
                                                        {{ $getTotalReplies }} Replies
                                                    </p>

                                                </div>
                                                <div class="my-4"></div>
                                                <p class="text-sm font-semibold text-red-500 hover:underline">Thread
                                                    ini telah diblokir dan di-private oleh Admin karena:
                                                    {{ $forumData->reason_delete }} </p>
                                            </p>

                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endif
                        <hr>
                    @endforeach
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
                                        <input type="" id="courseId" name="course_id"
                                            value="{{ $course->id }}">
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
                toolbar: ' wordcount | link image |bold italic underline| codesample ',
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
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);
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
                console.log("Editor Content:", editorContent);

                if (editorContent === '') {
                    alert('Error: Pesan tidak boleh kosong');
                    return;
                }

                var courseId = document.getElementById('courseId').value;
                var discussionTitle = document.getElementById('forum_title').value;
                if (discussionTitle === '') {
                    alert('Error: Pesan tidak boleh kosong');
                    return;
                }

                var materialId = document.getElementById('material_id').value;
                if (materialId === '') {
                    alert('Error: Pesan tidak boleh kosong');
                    return;
                }

                // Append image tag with the asset URL to the content
                var assetUrl = "{{ asset('uploads/forum_attachments/') }}"; // Laravel asset function
                editorContent += `<br><img src="${assetUrl}" alt="Uploaded Image">`;

                console.log('CSRF Token:', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                var formData = new FormData();
                formData.append('course_id', courseId);
                formData.append('material_id', materialId);
                formData.append('forum_title', discussionTitle);
                formData.append('forum_message', editorContent);

                fetch('/forum/course/' + courseId, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                    })
                    .then(response => {
                        if (response.ok) {
                            alert('Success! Your form has been uploaded.');
                            window.location.href = '/forum/course/' + courseId;
                        } else {
                            console.error('Error:', response.statusText);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        </script>

    </body>
@endsection

</html>
