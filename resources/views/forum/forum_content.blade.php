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
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
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
                        <div class="flex">
                            <div class="mr-3 flex-shrink-0">
                                <img class="mt-2 h-8 w-8 rounded-full sm:h-10 sm:w-10"
                                    src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                    alt="">
                            </div>
                            <div class="flex-1 rounded-lg px-4 pb-2 text-2xl leading-relaxed">
                                <strong>User Name</strong> <span class="ml-2 text-xl text-gray-400">Date Create
                                    Thread</span>
                                <p class="text-base">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco
                                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                    reprehenderit in
                                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                    laborum."
                                </p>
                            </div>

                        </div>
                        <hr>
                        <div class="flex w-full items-center justify-center bg-white">
                            <div>
                                <div class="mb-2 flex justify-between">
                                    <div class="mb-4">

                                    </div>
                                    <div class="flex gap-3 text-[#9CA3AF]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                        </svg>

                                    </div>
                                </div>
                                <textarea placeholder="Add your comment..."
                                    class="h-[120px] w-[60vw] resize-none rounded-md border-[0.1px] border-[#9EA5B1] p-2 font-bold focus:outline-1 focus:outline-blue-500"></textarea>
                                <div class="my-4 flex justify-end">
                                    <button
                                        class="absolute w-fit rounded bg-teal-400 px-4 py-2 text-sm font-semibold text-white">Balas</button>
                                </div>
                            </div>
                        </div>
                        <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>
                        <div class="space-y-4">
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
                                            <img class="h-6 w-6 rounded-full border border-white"
                                                src="https://images.unsplash.com/photo-1554151228-14d9def656e4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80"
                                                alt="">
                                            <img class="h-6 w-6 rounded-full border border-white"
                                                src="https://images.unsplash.com/photo-1513956589380-bad6acb9b9d4?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=100&q=80"
                                                alt="">
                                        </div>
                                        <div class="text-sm font-semibold text-gray-500">
                                            5 Replies
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="mr-3 flex-shrink-0">
                                    <img class="mt-2 h-8 w-8 rounded-full sm:h-10 sm:w-10"
                                        src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                        alt="">
                                </div>
                                <div class="flex-1 rounded-lg border px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
                                    <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34 PM</span>
                                    <p class="text-sm">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                        sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                        magna aliquyam erat, sed diam voluptua.
                                    </p>

                                    <h4 class="my-5 text-xs font-bold uppercase tracking-wide text-gray-400">Replies
                                    </h4>

                                    <div class="space-y-4">
                                        <div class="flex">
                                            <div class="mr-3 flex-shrink-0">
                                                <img class="mt-3 h-6 w-6 rounded-full sm:h-8 sm:w-8"
                                                    src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                                    alt="">
                                            </div>
                                            <div
                                                class="flex-1 rounded-lg bg-gray-100 px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
                                                <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34
                                                    PM</span>
                                                <p class="text-xs sm:text-sm">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                                    magna aliquyam erat, sed diam voluptua.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="mr-3 flex-shrink-0">
                                                <img class="mt-3 h-6 w-6 rounded-full sm:h-8 sm:w-8"
                                                    src="https://images.unsplash.com/photo-1604426633861-11b2faead63c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=200&h=200&q=80"
                                                    alt="">
                                            </div>
                                            <div
                                                class="flex-1 rounded-lg bg-gray-100 px-4 py-2 leading-relaxed sm:px-6 sm:py-4">
                                                <strong>Sarah</strong> <span class="text-xs text-gray-400">3:34
                                                    PM</span>
                                                <p class="text-xs sm:text-sm">
                                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                                    sed diam nonumy eirmod tempor invidunt ut labore et dolore
                                                    magna aliquyam erat, sed diam voluptua.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <div class="container mx-auto my-12 pb-12">

    </body>
@endsection


</html>
