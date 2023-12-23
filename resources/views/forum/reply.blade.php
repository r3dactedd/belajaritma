@if ($reply->reply_id == $data->id)
    <div class="flex">
        <div class="mr-3 flex-shrink-0">
            <img class="mt-3 h-5 w-5 rounded-full sm:h-8 sm:w-8"
                src="{{ asset('uploads/profile_images/' . $reply->formToUser->profile_img) }}" alt="">
        </div>
        <div class="flex-1 rounded-lg px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
            <strong>{{ $reply->formToUser->username }}</strong>
            <span class="text-xs text-gray-400">{{ $reply->created_at->format('h:i A') }}</span>
            <p class="text-md">
                <strong style="color: blue;">{{ '@' . $repliedTo }}</strong>
                {{ strip_tags($reply->forum_message) }}
            </p>
            <div class="transition">
                <div class="accordion-header flex h-12 cursor-pointer items-center space-x-5 px-2 transition">
                    <div class="flex -space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="0.8em" viewBox="0 0 640 512">
                            <path
                                d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                        </svg>
                    </div>
                    <a id="reply-text" data-modal-target="popup-reply" data-modal-toggle="popup-reply"
                        data-reply-message="{{ $reply->forum_message }}" data-reply-id="{{ $reply->id }}"
                        onclick="setReplyId(this)" class="accordion-header font-semibold text-gray-500 hover:underline">
                        Balas
                    </a>
                </div>
                <div class="accordion-content max-h-0 overflow-hidden px-5 pt-0">
                    <ul class="ml-0 list-inside space-y-2 pb-4"> <!-- Removed the left margin -->
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
    @php
        $repliedTo = $reply->formToUser->username;
    @endphp
@else()
    <hr class="my-2">
    <div class="flex class ml-10">
        <div class="mr-3 flex-shrink-0">
            <img class="mt-3 h-5 w-5 rounded-full sm:h-8 sm:w-8"
                src="{{ asset('uploads/profile_images/' . $reply->formToUser->profile_img) }}" alt="">
        </div>
        <div class="flex-1 rounded-lg px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
            <strong>{{ $reply->formToUser->username }}</strong>
            <span class="text-xs text-gray-400">{{ $reply->created_at->format('h:i A') }}</span>
            <p class="text-md">
                <strong style="color: blue;">{{ '@' . $repliedTo }}</strong>
                {{ strip_tags($reply->forum_message) }}
            </p>
            <div class="transition">
                <div class="accordion-header flex h-12 cursor-pointer items-center space-x-5 px-2 transition">
                    <div class="flex -space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="0.8em" viewBox="0 0 640 512">
                            <path
                                d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                        </svg>
                    </div>
                    <a id="reply-text" data-modal-target="popup-reply" data-modal-toggle="popup-reply"
                        data-reply-message="{{ $reply->forum_message }}" data-reply-id="{{ $reply->id }}"
                        onclick="setReplyId(this)" class="accordion-header font-semibold text-gray-500 hover:underline">
                        Balas
                    </a>
                </div>
                <div class="accordion-content max-h-0 overflow-hidden px-5 pt-0">
                    <ul class="ml-0 list-inside space-y-2 pb-4"> <!-- Removed the left margin -->
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
    @php
        $repliedTo = $reply->formToUser->username;
    @endphp
@endif

<div id="popup-reply" tabindex="-1" aria-hidden="true"
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
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="mx-auto rounded-xl bg-white px-2 py-2">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Balas Forum</h2>
                    <p class="text-md my-4" id="showComment">

                    </p>
                    <form id="myForm2_{{ $reply->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <textarea id="forum_reply" class="h-24" placeholder="Input Balasan Anda disini."></textarea>
                        {{-- <input type="hidden" id="replyId" name="reply_id" value="{{ $reply->id }}"> --}}
                        <input type="hidden" id="courseId" name="course_id" value="{{ $data->course_id }}">
                        <input type="hidden" id="materialId" name="material_id" value="{{ $data->material_id }}">
                        <input type="hidden" id="original_forum_id" name="forum_id" value="{{ $data->id }}">

                        <div class="my-4 flex justify-end">
                            <button id="get-content-button" type="submit"
                                class="absolute w-fit rounded bg-indigo-600 px-4 py-2 text-sm font-semibold text-white">Balas
                                Forum</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- Recursive call to include nested replies --}}
@if ($reply->replies && $reply->replies->count() > 0)
    @foreach ($reply->replies as $nestedReply)
        @include('forum.reply', ['reply' => $nestedReply, 'repliedTo' => $repliedTo])
    @endforeach
@endif

<script>
    // For reply
    tinymce.init({
        selector: '#forum_reply',
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
    document.getElementById('myForm2_{{ $reply->id }}').addEventListener('submit', function(event) {
        console.log("Hi, ini code getElementnya jalan Versi Reply Comment!")
        event.preventDefault(); // Prevent the default form submission behavior
        submitForm2();
    });

    function setReplyId(element) {
        var replyIdValue = element.getAttribute('data-reply-id');
        document.getElementById('replyId').value = replyIdValue;

        var replyMSGValue = element.getAttribute('data-reply-message');
        // Create a temporary element
        var tempElement = document.createElement('div');

        // Set the HTML content to the reply message
        tempElement.innerHTML = replyMSGValue;

        // Get the text content from the temporary element
        var textContent = tempElement.innerText;

        // Set the text content to the 'showComment' element
        document.getElementById('showComment').innerText = textContent;
    }

    function submitForm2() {
        var editorContent = tinymce.get('forum_reply').getContent();
        console.log("ini isian editorContent", editorContent)
        if (editorContent === '') {
            alert('Error: Forum message cannot be empty.');
            return;
        }

        // var hasImages = editorContent.includes('<img');
        // var fileInput = document.getElementById('forum_attachment');
        var courseId = document.getElementById('courseId').value;
        console.log("ini isian courseId", courseId)
        var replyId = document.getElementById('replyId').value;
        console.log("ini isian replyId", replyId)
        var forumId = document.getElementById('original_forum_id').value;
        console.log("ini forum id asli", forumId)
        var materialId = document.getElementById('materialId').value;
        console.log("ini isian materialId", materialId);


        console.log('CSRF Token:', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        var formData = new FormData();
        formData.append('course_id', courseId);
        formData.append('forum_message', editorContent);
        formData.append('reply_id', replyId);
        formData.append('material_id', materialId);

        // if (hasImages) {
        //     var file = fileInput.files[0];
        //     formData.append('forum_attachment', file);
        // }

        fetch('/forum/course/' + courseId + '/thread/' + forumId, {
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
                alert('Balasan anda berhasil dikirim.');
                window.location.href = '/forum/course/' + courseId + '/thread/' + forumId;
            })
            .catch(error => {
                // Handle errors, including non-JSON responses
                console.error('Error:', error);
            });
    }
</script>
{{-- </div>
</div> --}}