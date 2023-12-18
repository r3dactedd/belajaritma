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
                <strong style="color: blue;">{{ '@' . $reply->formToUser->username }}</strong>
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
                <strong style="color: blue;">{{ '@' . $reply->formToUser->username }}</strong>
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
@endif
{{-- <div class="flex">
    <div class="mr-3 flex-shrink-0">
        <img class="mt-3 h-5 w-5 rounded-full sm:h-8 sm:w-8"
            src="{{ asset('uploads/profile_images/' . $reply->formToUser->profile_img) }}" alt="">
    </div>
    <div class="flex-1 rounded-lg px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
        <strong>{{ $reply->formToUser->username }}</strong>
        <span class="text-xs text-gray-400">{{ $reply->created_at->format('h:i A') }}</span>
        <p class="text-md">
            <strong style="color: blue;">{{ '@' . $reply->formToUser->username }}</strong>
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

        <hr class="my-2"> --}}

{{-- Recursive call to include nested replies --}}
@if ($reply->replies && $reply->replies->count() > 0)
    @foreach ($reply->replies as $nestedReply)
        @include('forum.reply', ['reply' => $nestedReply])
    @endforeach
@endif
{{-- </div>
</div> --}}
