<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Certifications</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="./style.css" rel="stylesheet" />

</head>

<body class="bg-gray-200 pb-12">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <div class="bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>

                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Certifications </span>
                        </a>
                </div>
            </div>
        </div>


        <div
            class="f-r-t container mx-auto mb-10 mt-10 flex w-11/12 flex-col-reverse rounded-xl border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg lg:flex-row">
            <a href="/certifications/1">
                <div class="w-full lg:w-1/2">
                    <div class="pb-4 pl-4 pr-4 pt-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                        <div class="flex flex-row-reverse items-center justify-between lg:flex-col lg:items-start">
                            <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                Certification Name
                            </h2>
                        </div>
                        <p class="mb-6 w-11/12 text-sm font-normal tracking-normal text-gray-600 lg:w-9/12">
                            We recommend this introduction as a starting point for how to move from face-to-face to
                            online
                            teaching.
                            In this 60-minute webinar, we discuss how to effectively communicate with your students
                            & the range
                            of
                            ways you can deliver content online.
                        </p>
                    </div>
            </a>
            <div
                class="flex flex-row items-center justify-between border-t border-gray-300 px-5 py-3 md:px-10 lg:px-5 lg:py-4">

                <div class="flex items-center">
                    <p class="w-fit rounded-xl bg-green-400 px-6 py-1.5 text-sm text-white">
                        Selesai
                    </p>
                </div>
            </div>
        </div>
        <div class="relative inline-block h-64 w-full rounded-t lg:h-auto lg:w-1/2 lg:rounded-r lg:rounded-t-none">
            <img class="absolute inset-0 h-full w-full rounded-t object-cover lg:rounded-r lg:rounded-t-none"
                src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_43.png" alt="banner" />
        </div>
        </div>

        <div class="f-r-t container mx-auto mb-20 flex w-11/12 flex-col-reverse rounded bg-white shadow lg:flex-row">
            <div class="w-full lg:w-1/2">
                <div class="pb-4 pl-4 pr-4 pt-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                    <div class="flex flex-row-reverse items-center justify-between lg:flex-col lg:items-start">
                        <h4 class="text-base leading-4 tracking-normal text-yellow-400">
                            03:00pm
                        </h4>
                        <h4 class="text-base font-normal text-gray-600 lg:mt-3">
                            14 October, Tuesday
                        </h4>
                    </div>
                    <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                        Designing Remote Assessment
                    </h2>
                    <p class="mb-6 w-11/12 text-sm font-normal tracking-normal text-gray-600 lg:w-9/12">
                        This 60-minute webinar provides an overview of key considerations with regard to when and
                        how to
                        transition your planned face-to-face assessments to an online environment.
                    </p>
                    <div class="flex flex-col items-start lg:flex-row lg:items-center">
                        <div class="flex items-center">
                            <div class="h-6 w-6 rounded-full border-2 border-white shadow">
                                <img class="h-full w-full overflow-hidden rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1569605292330-189ccf83f98b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=48&q=80"
                                    alt="avatar" />
                            </div>
                            <div class="-ml-2 h-6 w-6 rounded-full border-2 border-white shadow">
                                <img class="h-full w-full overflow-hidden rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1558622840-a3330bd26685?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=48&q=80"
                                    alt="avatar" />
                            </div>
                            <div class="-ml-2 h-6 w-6 rounded-full border-2 border-white shadow">
                                <img class="h-full w-full overflow-hidden rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1586548634342-04801afc8b13?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=48&q=80"
                                    alt="avatar" />
                            </div>
                            <div class="-ml-2 h-6 w-6 rounded-full border-2 border-white shadow">
                                <img class="h-full w-full overflow-hidden rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1534352909952-981bf1070b3c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=48&q=80"
                                    alt="avatar" />
                            </div>
                            <div class="-ml-2 h-6 w-6 rounded-full border-2 border-white shadow">
                                <img class="h-full w-full overflow-hidden rounded-full object-cover"
                                    src="https://images.unsplash.com/photo-1582971805810-b24306e0afe7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=48&q=80"
                                    alt="avatar" />
                            </div>
                            <p class="ml-1 text-xs font-normal text-gray-600">
                                +12 Attendees
                            </p>
                        </div>
                        <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-map-pin mr-1 text-gray-600" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <circle cx="12" cy="11" r="3" />
                                <path
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z" />
                            </svg>
                            <p class="text-center text-sm font-normal tracking-normal text-gray-600">
                                Online Seminar
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-row items-center justify-between border-t border-gray-300 px-5 py-3 md:px-10 lg:px-5 lg:py-4">
                    <div class="flex items-center">
                        <div class="flex items-center">
                            <div
                                class="relative flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full border border-gray-400 bg-white p-px">
                                <input checked type="radio" name="radio1"
                                    class="checkbox1 absolute h-full w-full cursor-pointer appearance-none rounded-full checked:border-none focus:outline-none" />
                                <div class="check-icon1 z-1 hidden h-2 w-2 rounded-full bg-gray-800"></div>
                            </div>
                            <p class="ml-2 text-sm font-normal leading-4 text-gray-800">Going</p>
                        </div>
                        <div class="ml-6 flex items-center">
                            <div
                                class="relative flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full border border-gray-400 bg-white p-px">
                                <input checked type="radio" name="radio1"
                                    class="checkbox1 absolute h-full w-full cursor-pointer appearance-none rounded-full checked:border-none focus:outline-none" />
                                <div class="check-icon1 z-1 hidden h-2 w-2 rounded-full bg-gray-800"></div>
                            </div>
                            <p class="ml-2 text-sm font-normal leading-4 text-gray-800">Not Going</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <svg class="feather feather-bookmark mr-4 cursor-pointer text-gray-600 hover:text-gray-700"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <svg class="feather feather-share-2 cursor-pointer text-yellow-400 hover:text-indigo-600"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="18" cy="5" r="3"></circle>
                            <circle cx="6" cy="12" r="3"></circle>
                            <circle cx="18" cy="19" r="3"></circle>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="relative inline-block h-64 w-full rounded-t lg:h-auto lg:w-1/2 lg:rounded-r lg:rounded-t-none">
                <img class="absolute inset-0 h-full w-full rounded-t object-cover lg:rounded-r lg:rounded-t-none"
                    src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_44.png" alt="banner" />
            </div>
        </div>
    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection

</body>


</html>
