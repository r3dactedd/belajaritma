<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
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
        <div class="" style="background-image: url(/storage/image/bg-home.svg);">
            <div class="container mx-auto p-5">
                <div class="my-4 md:-mx-2 md:flex">

                    <!-- Right Side -->
                    <div class="h-full w-full">


                        <div class="md:mx-2 md:w-3/4">
                            <div class="rounded-xl bg-none px-4 py-2 md:px-8">
                                <h1
                                    class="pr-2 pt-2 text-center text-xl font-bold tracking-normal text-white md:pr-4 md:pt-4 md:text-left lg:text-4xl">
                                    Selamat Datang
                                </h1>
                                <h1
                                    class="pr-2 pt-2 text-center text-lg font-bold tracking-normal text-white md:pr-4 md:pt-8 md:text-left lg:text-3xl">
                                    di Belajaritma.
                                </h1>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- card 2 -->
        <div class="container mx-auto mb-12 mt-6 w-11/12">
            <div class="flex flex-wrap">
                <div class="mb-12 w-full lg:w-3/5 lg:pr-8">
                    <div class="rounded bg-white px-4 py-8 shadow-sm sm:px-4 xl:px-8">
                        <p class="text-lg font-bold">Aktivitas Anda</p>
                        <div class="relative border-b border-gray-300 pb-8 pt-8 sm:flex md:flex lg:flex xl:flex">
                            <div class="flex w-11/12">

                                <div class="w-full px-4">
                                    <p class="text-base font-semibold">
                                        Data Structure
                                    </p>

                                    <div class="my-2 flex-wrap justify-between md:flex lg:flex xl:flex">
                                        <p class="mb-2 text-sm text-gray-600 lg:mb-0 xl:mb-0">

                                            <span class="font-bold text-yellow-400">Sedang Dipelajari</span>
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
                                    class="ml-2 mt-8 rounded-full bg-green-400 px-6 py-2 text-xs font-semibold text-white focus:outline-none md:mt-0 md:w-32 md:px-12 md:py-3">
                                    Selesai
                                </button>
                            </div>
                        </div>
                        <div class="relative border-b border-gray-300 pb-8 pt-8 sm:flex md:flex lg:flex xl:flex">
                            <div class="flex w-11/12">

                                <div class="w-full px-4">
                                    <p class="text-base font-semibold">
                                        Data Structure
                                    </p>

                                    <div class="my-2 flex-wrap justify-between md:flex lg:flex xl:flex">
                                        <p class="mb-2 text-sm text-gray-600 lg:mb-0 xl:mb-0">

                                            <span class="font-bold text-yellow-400">Sedang Dipelajari</span>
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
                                    class="ml-2 mt-8 rounded-full bg-yellow-400 px-6 py-2 text-xs font-semibold text-white focus:outline-none md:mt-0 md:w-32 md:px-12 md:py-3">
                                    Lanjut
                                </button>
                            </div>
                        </div>

                        <div class="relative pb-8 pt-6 sm:flex md:flex lg:flex xl:flex">
                            <div class="flex w-11/12">

                                <div class="w-full px-4">
                                    <p class="text-base font-semibold">
                                        Coursename
                                    </p>

                                    <div class="my-2 flex-wrap justify-between md:flex lg:flex xl:flex">
                                        <p class="mb-2 text-sm text-gray-600 lg:mb-0 xl:mb-0">

                                            <span class="font-bold text-yellow-400">Sedang Dipelajari</span>
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
                                    class="ml-2 mt-8 rounded-full bg-green-400 px-6 py-2 text-xs font-semibold text-white focus:outline-none md:mt-0 md:w-32 md:px-12 md:py-3">
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
    @include('layout.footer')
@endsection

</html>