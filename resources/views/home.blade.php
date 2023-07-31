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
    @extends('layout')
    @section('header')
        @include('header')
    @endsection
    @section('content')
        <!-- Data card style 7 starts -->
        <div class="container mx-auto my-12 grid w-11/12 gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div class="flex items-center rounded bg-white px-8 py-6 shadow">
                <div class="rounded bg-teal-400 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-discount" width="32"
                        height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="9" y1="15" x2="15" y2="9" />
                        <circle cx="9.5" cy="9.5" r=".5" />
                        <circle cx="14.5" cy="14.5" r=".5" />
                        <path
                            d="M5 7.2a2.2 2.2 0 0 1 2.2 -2.2h1a2.2 2.2 0 0 0 1.55 -.64l.7 -.7a2.2 2.2 0 0 1 3.12 0l.7 .7a2.2 2.2 0 0 0 1.55 .64h1a2.2 2.2 0 0 1 2.2 2.2v1a2.2 2.2 0 0 0 .64 1.55l.7 .7a2.2 2.2 0 0 1 0 3.12l-.7 .7a2.2 2.2 0 0 0 -.64 1.55 v1a2.2 2.2 0 0 1 -2.2 2.2h-1a2.2 2.2 0 0 0 -1.55 .64l-.7 .7a2.2 2.2 0 0 1 -3.12 0l-.7 -.7a2.2 2.2 0 0 0 -1.55 -.64h-1a2.2 2.2 0 0 1 -2.2 -2.2v-1a2.2 2.2 0 0 0 -.64 -1.55l-.7 -.7a2.2 2.2 0 0 1 0 -3.12l.7 -.7a2.2 2.2 0 0 0 .64 -1.55 v-1" />
                    </svg>
                </div>
                <div class="ml-6">
                    <h3 class="mb-1 text-2xl font-bold leading-5 text-gray-800">23</h3>
                    <p class="text-sm font-normal leading-5 tracking-normal text-gray-600">
                        Course Taken
                    </p>
                </div>
            </div>
            <div class="flex items-center rounded bg-white px-8 py-6 shadow">
                <div class="rounded bg-teal-400 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-click text-white"
                        width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="3" y1="12" x2="6" y2="12" />
                        <line x1="12" y1="3" x2="12" y2="6" />
                        <line x1="7.8" y1="7.8" x2="5.6" y2="5.6" />
                        <line x1="16.2" y1="7.8" x2="18.4" y2="5.6" />
                        <line x1="7.8" y1="16.2" x2="5.6" y2="18.4" />
                        <path d="M12 12l9 3l-4 2l-2 4l-3 -9" />
                    </svg>
                </div>
                <div class="ml-6">
                    <h3 class="mb-1 text-2xl font-bold leading-5 text-gray-800">87%</h3>
                    <p class="text-sm font-normal leading-5 tracking-normal text-gray-600">
                        Completion Rate
                    </p>
                </div>
            </div>
            <div class="flex items-center rounded bg-white px-8 py-6 shadow">
                <div class="rounded bg-teal-400 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="32"
                        height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="12" cy="7" r="4" />
                        <path d="M5.5 21v-2a4 4 0 0 1 4 -4h5a4 4 0 0 1 4 4v2" />
                    </svg>
                </div>
                <div class="ml-6">
                    <h3 class="mb-1 text-2xl font-bold leading-5 text-gray-800">345</h3>
                    <p class="text-sm font-normal leading-5 tracking-normal text-gray-600">
                        Quizes Taken
                    </p>
                </div>
            </div>
            <div class="flex items-center rounded bg-white px-8 py-6 shadow">
                <div class="rounded bg-teal-400 p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card"
                        width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="3" y="5" width="18" height="14" rx="3" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                        <line x1="7" y1="15" x2="7.01" y2="15" />
                        <line x1="11" y1="15" x2="13" y2="15" />
                    </svg>
                </div>
                <div class="ml-6">
                    <h3 class="mb-1 text-2xl font-bold leading-5 text-gray-800">
                        239 hours
                    </h3>
                    <p class="text-sm font-normal leading-5 tracking-normal text-gray-600">
                        Of videos watched
                    </p>
                </div>
            </div>
        </div>

        <!-- card 2 -->
        <div class="container mx-auto my-4 w-11/12">
            <div class="f-r-t flex flex-wrap">
                <div class="mb-12 w-full lg:w-3/5 lg:pr-8">
                    <div class="rounded bg-white px-4 py-8 shadow-sm sm:px-4 xl:px-8">
                        <p class="text-lg font-bold">Kursus Yang Diambil</p>
                        <div class="relative border-b border-gray-300 pb-8 pt-8 sm:flex md:flex lg:flex xl:flex">
                            <div class="flex w-11/12">
                                <div class="h-12 w-12 rounded-full bg-cover bg-center bg-no-repeat">
                                    <img class="w-full rounded-full border-2 border-white object-cover shadow"
                                        src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_2.png"
                                        alt="" />
                                </div>
                                <div class="w-full px-4">
                                    <p class="text-base font-bold text-gray-800">
                                        Data Structure
                                    </p>

                                    <div class="my-2 flex-wrap justify-between md:flex lg:flex xl:flex">
                                        <p class="mb-2 text-sm text-gray-600 lg:mb-0 xl:mb-0">

                                            <span class="font-bold text-yellow-400">In Progress</span>
                                        </p>
                                    </div>
                                    <div class="mt-6 max-w-xl rounded-xl bg-gray-600">
                                        <div class="rounded-xl bg-blue-400 py-1 text-center text-xs leading-none text-white"
                                            style="width: 45%">45%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="right-0 top-0 mt-0 block pl-12 sm:relative sm:mt-0 md:relative md:mt-0 md:pl-0 lg:relative lg:mt-0 xl:relative">
                                <button
                                    class="ml-2 mt-8 rounded-full bg-yellow-400 px-6 py-2 text-xs text-white focus:outline-none md:mt-0 md:w-32 md:px-12 md:py-3">
                                    Lanjut
                                </button>
                            </div>
                        </div>
                        <div class="relative border-b border-gray-300 pb-8 pt-8 sm:flex md:flex lg:flex xl:flex">
                            <div class="flex w-11/12">
                                <div class="h-12 w-12 rounded-full bg-cover bg-center bg-no-repeat">
                                    <img class="w-full rounded-full border-2 border-white object-cover shadow"
                                        src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_2.png"
                                        alt="" />
                                </div>
                                <div class="w-full px-4">
                                    <p class="text-base font-bold text-gray-800">
                                        Data Structure
                                    </p>

                                    <div class="my-2 flex-wrap justify-between md:flex lg:flex xl:flex">
                                        <p class="mb-2 text-sm text-gray-600 lg:mb-0 xl:mb-0">

                                            <span class="font-bold text-yellow-400">In Progress</span>
                                        </p>
                                    </div>
                                    <div class="mt-6 max-w-xl rounded-xl bg-gray-600">
                                        <div class="rounded-xl bg-blue-400 py-1 text-center text-xs leading-none text-white"
                                            style="width: 80%">80%
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="right-0 top-0 mt-0 block pl-12 sm:relative sm:mt-0 md:relative md:mt-0 md:pl-0 lg:relative lg:mt-0 xl:relative">
                                <button
                                    class="ml-2 mt-8 rounded-full bg-yellow-400 px-6 py-2 text-xs text-white focus:outline-none md:mt-0 md:w-32 md:px-12 md:py-3">
                                    Lanjut
                                </button>
                            </div>
                        </div>

                        <div class="relative pb-8 pt-6 sm:flex md:flex lg:flex xl:flex">
                            <div class="flex w-11/12">
                                <div class="h-12 w-12 rounded-full bg-cover bg-center bg-no-repeat">
                                    <img class="w-full rounded-full border-2 border-white object-cover shadow"
                                        src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_5.png"
                                        alt="" />
                                </div>
                                <div class="w-full px-4">
                                    <p class="text-base font-bold text-gray-800">
                                        Data Structure
                                    </p>

                                    <div class="my-2 flex-wrap justify-between md:flex lg:flex xl:flex">
                                        <p class="mb-2 text-sm text-gray-600 lg:mb-0 xl:mb-0">

                                            <span class="font-bold text-yellow-400">In Progress</span>
                                        </p>
                                    </div>
                                    <div class="mt-6 max-w-xl rounded-xl bg-gray-600">
                                        <div class="rounded-xl bg-blue-400 py-1 text-center text-xs leading-none text-white"
                                            style="width: 100%">100%
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="right-0 top-0 mt-0 pl-12 sm:relative sm:mt-0 md:relative md:mt-0 md:pl-0 lg:relative lg:mt-0 xl:relative">
                                <button
                                    class="ml-2 mt-8 rounded-full bg-green-600 px-6 py-2 text-xs text-white focus:outline-none md:mt-0 md:w-32 md:px-12 md:py-3">
                                    Selesai
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mb-12 w-full lg:w-2/5">
                    <div class="rounded border border-gray-300 bg-white p-8 shadow">
                        <p class="mb-12 text-lg font-bold">Trending Courses</p>
                        <div class="flex items-center border-b border-gray-300 pb-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg text-gray-700">
                                <img src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_6.png"
                                    alt="" class="h-full w-full object-cover" />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-normal leading-5 tracking-normal text-gray-500">
                                    Introduction to VR Development
                                </p>
                                <h3 class="mt-1 text-2xl font-bold leading-6 text-gray-900">
                                    $198
                                </h3>
                            </div>
                        </div>
                        <div class="flex items-center border-b border-gray-300 py-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg text-gray-700">
                                <img src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_7.png"
                                    alt="" class="h-full w-full object-cover" />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-normal leading-5 tracking-normal text-gray-500">
                                    Crash course on Big Data
                                </p>
                                <h3 class="mt-1 text-2xl font-bold leading-6 text-gray-900">
                                    $99
                                </h3>
                            </div>
                        </div>
                        <div class="flex items-center border-b border-gray-300 py-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg text-gray-700">
                                <img src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_8.png"
                                    alt="" class="h-full w-full object-cover" />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-normal leading-5 tracking-normal text-gray-500">
                                    Mobile App Development
                                </p>
                                <h3 class="mt-1 text-2xl font-bold leading-6 text-gray-900">
                                    $199
                                </h3>
                            </div>
                        </div>
                        <div class="flex items-center border-b border-gray-300 py-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg text-gray-700">
                                <img src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_6.png"
                                    alt="" class="h-full w-full object-cover" />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-normal leading-5 tracking-normal text-gray-500">
                                    Introduction to VR Development
                                </p>
                                <h3 class="mt-1 text-2xl font-bold leading-6 text-gray-900">
                                    $198
                                </h3>
                            </div>
                        </div>
                        <div class="flex items-center border-b border-gray-300 py-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-lg text-gray-700">
                                <img src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_7.png"
                                    alt="" class="h-full w-full object-cover" />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-normal leading-5 tracking-normal text-gray-500">
                                    Crash course on Big Data
                                </p>
                                <h3 class="mt-1 text-2xl font-bold leading-6 text-gray-900">
                                    $99
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script>
            // Avatar Dropdown
            function dropdownHandler(element) {
                let single = element.getElementsByTagName("ul")[0];
                single.classList.toggle("hidden");
            }
            //Hamburger and mobile menu
            function MenuHandler(el, val) {
                let MainList = el.parentElement.parentElement.getElementsByTagName(
                    "ul"
                )[0];
                let closeIcon = el.parentElement.parentElement.getElementsByClassName(
                    "close-m-menu"
                )[0];
                let showIcon = el.parentElement.parentElement.getElementsByClassName(
                    "show-m-menu"
                )[0];
                if (val) {
                    MainList.classList.remove("hidden");
                    el.classList.add("hidden");
                    closeIcon.classList.remove("hidden");
                } else {
                    showIcon.classList.remove("hidden");
                    MainList.classList.add("hidden");
                    el.classList.add("hidden");
                }
            }
        </script>
    </body>
@endsection

@section('footer')
    @include('footer')
@endsection

</html>
