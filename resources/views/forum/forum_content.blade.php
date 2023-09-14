<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
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
                        <a class="flex items-center" href="/home">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Forum</span>
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
                                    src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                    alt="">
                            </div>
                            <div class="flex-1 rounded-lg px-4 pb-2 text-2xl leading-relaxed">
                                <strong>{{$data->forum_title}}</strong> <span class="ml-2 text-xl text-gray-400">{{$data->created_at}}</span>

                                <div>
                                    <p class="text-sm inline">
                                        Created By {{$data->formToUser->username}}
                                    </p>
                                    <p class="text-sm inline ml-5">
                                        <b>
                                            {{$data->formToMasterType->master_type_name}}
                                        </b>
                                    </p>
                                </div>
                                <p class="text-base mt-4">
                                    {{$data->forum_message}}
                                </p>
                            </div>
                        </div>
                        <div class="flex w-full items-center md:ml-16">
                            <img
                                src="https://cdn.discordapp.com/attachments/699690186761830516/1136295687810723942/image.png">
                        </div>
                        {{-- FORUM CONTENT END --}}
                        {{-- ADD COMMENTS --}}
                        <hr>
                        <div class="flex w-full items-center justify-center bg-white">
                            <div class="w-full">

                                {{-- QUILL JS HERE --}}
                                <div id="editor">
                                </div>
                                {{-- QUILL JS HERE --}}
                                <div class="my-4 flex justify-end">
                                    <button id="get-content-button"
                                        class="absolute w-fit rounded bg-teal-400 px-4 py-2 text-sm font-semibold text-white">Balas</button>
                                </div>
                            </div>
                        </div>
                        {{-- ADD COMMENTS END --}}

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
                                    <div class="mt-4 flex items-center">
                                        <div class="mr-2 flex -space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="0.8em"
                                                viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                                            </svg>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-500">
                                            Balas
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- COMMENTS LIST NO REPLY --}}
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
                                    <div class="mt-4 flex items-center">
                                        <div class="mr-2 flex -space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="0.8em"
                                                viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                                            </svg>
                                        </div>
                                        <div class="text-sm font-semibold text-gray-500">
                                            Balas
                                        </div>
                                    </div>
                                    <hr class="my-2">
                                    <div class="space-y-4">
                                        <div class="flex">
                                            <div class="mr-3 flex-shrink-0">
                                                <img class="mt-3 h-5 w-5 rounded-full sm:h-8 sm:w-8"
                                                    src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                                    alt="">
                                            </div>
                                            <div class="flex-1 rounded-lg px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
                                                <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                                                <p class="text-md">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                                    magna aliquyam erat, sed diam voluptua.
                                                </p>
                                                <div class="mt-4 flex items-center">
                                                    <div class="mr-2 flex -space-x-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="0.8em"
                                                            viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                            <path
                                                                d="M32 176c0-74.8 73.7-144 176-144s176 69.2 176 144s-73.7 144-176 144c-15.3 0-30.6-1.9-46.3-5c-3.5-.7-7.1-.2-10.2 1.4c-6.1 3.1-12 6-18 8.7c-28.4 12.9-60.2 23.1-91.5 26c14.9-19 26.8-39.7 37.6-59.9c3.3-6.1 2.3-13.6-2.5-18.6C50 244.2 32 213.1 32 176zM208 0C93.1 0 0 78.9 0 176c0 44.2 19.8 80.1 46 110c-11.7 21-24 40.6-39.5 57.5l0 0-.1 .1c-6.5 7-8.2 17.1-4.4 25.8C5.8 378.3 14.4 384 24 384c43 0 86.5-13.3 122.7-29.7c4.9-2.2 9.6-4.5 14.3-6.8c15.3 2.8 30.9 4.6 47 4.6c114.9 0 208-78.9 208-176S322.9 0 208 0zM447.4 160.5C541.6 167 608 233 608 304c0 37.1-18 68.2-45.1 96.6c-4.8 5-5.8 12.5-2.5 18.6c10.9 20.2 22.7 40.8 37.6 59.9c-31.3-3-63.2-13.2-91.5-26c-6-2.7-11.9-5.6-18-8.7c-3.2-1.6-6.8-2.1-10.2-1.4c-15.6 3.1-30.9 5-46.3 5c-68.2 0-123.6-30.7-153.1-73.3c-11 3-22.3 5.2-33.8 6.8C279 439.8 349.9 480 432 480c16.1 0 31.7-1.8 47-4.6c4.6 2.3 9.4 4.6 14.3 6.8C529.5 498.7 573 512 616 512c9.6 0 18.2-5.7 22-14.5c3.8-8.7 2-18.9-4.4-25.8l-.1-.1 0 0c-15.5-17-27.8-36.5-39.5-57.5c26.2-29.9 46-65.8 46-110c0-94.4-87.8-171.5-198.2-175.8c2.8 10.4 4.7 21.2 5.6 32.3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="text-sm font-semibold text-gray-500">
                                                        Balas
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- COMMENTS LIST W/REPLY --}}
                        </div>
                        {{-- COMMENTS LIST END --}}
                    </div>
                </div>

            </div>
        </div>
        </div>
        <div class="container mx-auto my-12 pb-12">

    </body>
@endsection
<script>
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

</html>
