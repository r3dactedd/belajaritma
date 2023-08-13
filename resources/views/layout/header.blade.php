<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />

</head>
<!-- nav -->

<div class="mx-auto w-full border-b border-gray-300 bg-white px-5 shadow-sm sm:px-10">
    <div class="container mx-auto flex h-16 items-center justify-between lg:items-stretch">
        <div class="flex h-full items-center">
            <a href="/" class="">
                <img src="{{ asset('/storage/images/belajaritma-logo-removebg-preview.png') }}" class="w-700 h-12 fill-current" alt="">
            </a>
            <ul class="hidden h-full items-center lg:flex ml-12">
                <li
                    class="text-md flex h-full cursor-pointer items-center border-b-2 border-teal-400 font-bold tracking-normal text-teal-400">
                    <a href="/home">Home</a>
                </li>
                <li
                    class="text-md mx-10 flex h-full cursor-pointer items-center font-bold tracking-normal text-gray-800">
                    <a href="/courses">Kursus</a>
                </li>
                <li
                    class="text-md mr-10 flex h-full cursor-pointer items-center font-bold tracking-normal text-gray-800">
                    <a href="/students">Sertifikasi</a>
                </li>
                <li
                    class="text-md mr-10 flex h-full cursor-pointer items-center font-bold tracking-normal text-gray-800">
                    <a href="instructors">Add shits</a>
                </li>
            </ul>
        </div>
        <div class="hidden h-full items-center justify-end lg:flex">
            <div class="flex h-full w-full items-center">
                <div class="flex h-full w-full">
                    @auth
                        <div class="relative flex w-full cursor-pointer items-center justify-end"
                            onclick="dropdownHandler(this)">
                            <ul class="absolute left-0 top-0 mt-16 hidden w-40 rounded border-r bg-white p-2 shadow">
                                <li
                                    class="cursor-pointer py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none">
                                    <div class="flex items-center">

                                        <a href="/profile/1"class="ml-2">My Profile</a>
                                    </div>
                                </li>
                                <li
                                    class="mt-2 flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none">

                                    <a class="ml-2">Account Settings</a>
                                </li>
                                <li
                                    class="mt-2 flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none">

                                    <form method="POST" action="/logout">
                                        @csrf
                                        <button type="submit" class="ml-2"> Logout</button>
                                    </form>
                                </li>
                            </ul>
                            <img class="h-10 w-10 rounded object-cover"
                                src="https://tuk-cdn.s3.amazonaws.com/assets/components/horizontal_navigation/hn_1.png"
                                alt="logo" />
                            <p class="text-md ml-2 font-semibold text-gray-800">{{ auth()->user()->username }}</p> <svg
                                class="ml-2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                            </svg>
                        </div>
                    @endauth

                </div>
            </div>
        </div>
        <div
            class="cursor-pointer text-gray-700 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none lg:hidden">
            <ul class="absolute left-0 right-0 top-0 z-40 mt-16 hidden rounded border-r bg-white p-2 shadow md:mt-16">
                <li
                    class="flex cursor-pointer py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none lg:hidden">
                    <div class="flex items-center">
                        <span class="ml-2 font-bold"><a href="index.html">Dashboard</a></span>
                    </div>
                </li>
                <li class="flex cursor-pointer flex-col justify-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none lg:hidden"
                    onclick="dropdownHandler(this)">
                    <div class="flex items-center">
                        <span class="ml-2 font-bold"><a href="courses.html">Courses</a></span>
                    </div>
                </li>
                <li
                    class="flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none lg:hidden">
                    <span class="ml-2 font-bold"><a href="students.html">Students</a></span>
                </li>
                <li
                    class="flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none lg:hidden">
                    <span class="ml-2 font-bold"><a href="instructors.html">Instructors</a></span>
                </li>
                <li
                    class="flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none lg:hidden">
                    <span class="ml-2 font-bold"><a href="publishers.html">Publishers</a></span>
                </li>
                <li
                    class="flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none lg:hidden">
                    <span class="ml-2 font-bold"><a href="webinars.html">Webinars</a></span>
                </li>
                <li
                    class="ml-2 mt-2 flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none">
                    <div class="flex items-center">
                        <div
                            class="flex w-12 cursor-pointer rounded border-2 border-transparent text-sm transition duration-150 ease-in-out focus:border-white focus:outline-none">
                            <img class="h-10 w-10 rounded object-cover"
                                src="https://tuk-cdn.s3.amazonaws.com/assets/components/horizontal_navigation/hn_1.png"
                                alt="logo" />
                        </div>
                        <p class="ml-1 cursor-pointer text-base leading-6">Jane Doe</p>
                        <div class="relative text-white sm:ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-chevron-down cursor-pointer" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </div>
                    </div>
                </li>
                <li
                    class="ml-2 cursor-pointer pb-4 pt-2 text-base leading-3 tracking-normal text-gray-600 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                        </svg>
                        <span class="ml-2 leading-6">Profile</span>
                    </div>
                </li>
            </ul>
            <div>
                <div class="show-m-menu lg:hidden" onclick="MenuHandler(this,true)">
                    <svg aria-haspopup="true" aria-label="Main Menu" xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-menu" width="32" height="32" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="#2C3E50" fill="none" stroke-linecap="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="4" y1="8" x2="20" y2="8" />
                        <line x1="4" y1="16" x2="20" y2="16" />
                    </svg>
                </div>
                <div onclick="MenuHandler(this,false)" class="close-m-menu hidden">
                    <svg aria-label="Close" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
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
