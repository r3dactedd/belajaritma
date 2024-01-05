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

<div class="fixed top-0 z-40 mx-auto w-full border-b border-gray-300 bg-white px-5 shadow-sm sm:px-10">
    <div class="container mx-auto flex h-16 items-center justify-between lg:items-stretch">
        <div class="flex h-full items-center">
            <a href="/" class="relative mr-10 flex h-full items-center font-black leading-none">
                {{-- <svg class="h-6 w-auto fill-current text-indigo-600" viewBox="0 0 194 116"
                    xmlns="http://www.w3.org/2000/svg">
                    <g fill-rule="evenodd">
                        <path
                            d="M96.869 0L30 116h104l-9.88-17.134H59.64l47.109-81.736zM0 116h19.831L77 17.135 67.088 0z" />
                        <path d="M87 68.732l9.926 17.143 29.893-51.59L174.15 116H194L126.817 0z" />
                    </g>
                </svg> --}}
                <span class="ml-4 text-2xl text-gray-800">Belajaritma</span>
            </a>
            <ul class="hidden h-full items-center lg:flex">
                <li
                    class="mr-10 flex h-full cursor-pointer items-center text-base font-bold tracking-normal text-gray-800">
                    <a href="/home" id="home-link"class="hover:text-indigo-600 hover:underline">Home</a>
                </li>
                @if (!Auth::user())
                    <li
                        class="mr-10 flex h-full cursor-pointer items-center text-base font-bold tracking-normal text-gray-800">
                        <a href="/courses" id="courses-link" class="hover:text-indigo-600 hover:underline">Kursus</a>
                    </li>
                    <li
                        class="mr-10 flex h-full cursor-pointer items-center text-base font-bold tracking-normal text-gray-800">
                        <a href="/certifications" id="certifications-link"
                            class="hover:text-indigo-600 hover:underline">Sertifikasi</a>
                    </li>
                @elseif (Auth::user()->role_id == '2')
                    <li
                        class="mr-10 flex h-full cursor-pointer items-center text-base font-bold tracking-normal text-gray-800">
                        <a href="/courses" id="courses-link" class="hover:text-indigo-600 hover:underline">Kursus</a>
                    </li>
                    <li
                        class="mr-10 flex h-full cursor-pointer items-center text-base font-bold tracking-normal text-gray-800">
                        <a href="/certifications" id="certifications-link"
                            class="hover:text-indigo-600 hover:underline">Sertifikasi</a>
                    </li>
                @endif
                {{-- @endif
                @endif --}}
                @if (Auth::check())
                    <li
                        class="mr-10 flex h-full cursor-pointer items-center text-base font-bold tracking-normal text-gray-800">
                        <a href="/forum" id="forums-link"class="hover:text-indigo-600 hover:underline">Forum</a>
                    </li>
                @endif
                @if (Auth::check())
                    @if (Auth::user()->role_id == '1')
                        <li
                            class="mr-10 flex h-full cursor-pointer items-center text-base font-bold tracking-normal text-gray-800">
                            <a href="/manager" id="manager-link"class="hover:text-indigo-600 hover:underline">Admin
                                Manager</a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
        <div class="hidden h-full items-center justify-end lg:flex">
            <div class="flex h-full w-full items-center">
                <div class="flex h-full w-full">
                    @if (Auth::check())
                        @auth
                            <div id='profile-link' class="relative flex w-full cursor-pointer items-center justify-end"
                                onclick="dropdownHandler(this)">
                                <ul class="absolute left-0 top-0 mt-16 hidden w-40 rounded border-r bg-white shadow">
                                    <li
                                        class="mt-2 flex cursor-pointer py-2 text-sm leading-3 tracking-normal text-gray-600 hover:bg-gray-200 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none">
                                        <div class="flex items-center">
                                            <a href="/profile/{{ auth()->user()->username }}"class="ml-4 font-semibold">Profil
                                                Saya</a>
                                        </div>
                                    </li>
                                    <li
                                        class="mt-2 flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:bg-gray-200 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none">

                                        <a href="/editProfile" class="ml-4 font-semibold">Atur
                                            Profil</a>
                                    </li>
                                    <li
                                        class="my-2 flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:bg-gray-200 hover:text-red-600 focus:text-indigo-600 focus:outline-none">

                                        <form method="POST" action="/logout">
                                            @csrf
                                            <button type="submit" class="ml-4 font-semibold">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                                <img class="h-10 w-10 rounded-full object-cover"
                                    src={{ asset('uploads/profile_images/' . Auth::user()->profile_img) }} alt="" />
                                <p class="ml-2 text-base font-semibold text-gray-800">{{ auth()->user()->username }}</p>
                                <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">

                                    <path
                                        d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />

                                </svg>
                            </div>
                        @endauth
                </div>
            </div>
            {{-- KALAU BLM ADA ACCOUNT --}}
        @else
        </div>
    </div>
    <a href="/login"
        class="focus:shadow-outline my-2 rounded-lg border border-solid bg-indigo-500 px-8 py-2 text-sm font-semibold text-white hover:bg-teal-800 focus:outline-none md:my-0 md:ml-4 md:mt-0">Login</a>
    <a href="/signup"
        class="focus:shadow-outline my-2 rounded-lg border border-solid bg-indigo-500 px-8 py-2 text-sm font-semibold text-white hover:bg-teal-800 focus:outline-none md:my-0 md:ml-4 md:mt-0">Daftar</a>
    @endif
</div>

{{-- MOBILE DESIGN --}}
<div
    class="cursor-pointer text-gray-700 transition duration-300 ease-in-out hover:text-gray-700 focus:outline-none lg:hidden">

    <ul class="absolute left-0 right-0 top-0 z-40 mt-16 hidden rounded border-r bg-white p-2 shadow md:mt-16">
        <li
            class="flex cursor-pointer py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none lg:hidden">
            <div class="flex items-center">
                <span class="my-1 ml-2 font-bold"><a href="/#">Home</a></span>
            </div>
        </li>
        @if (!Auth::user())
            <li class="flex cursor-pointer flex-col justify-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none lg:hidden"
                onclick="dropdownHandler(this)">
                <div class="flex items-center">
                    <span class="my-1 ml-2 font-bold"><a href="/courses">Kursus</a></span>
                </div>
            </li>
            <li
                class="flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none lg:hidden">
                <span class="my-1 ml-2 font-bold"><a href="/certifications">Sertifikasi</a></span>
            </li>
        @elseif (Auth::user()->role_id == '2')
            <li class="flex cursor-pointer flex-col justify-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none lg:hidden"
                onclick="dropdownHandler(this)">
                <div class="flex items-center">
                    <span class="my-1 ml-2 font-bold"><a href="/courses">Kursus</a></span>
                </div>
            </li>
            <li
                class="flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none lg:hidden">
                <span class="my-1 ml-2 font-bold"><a href="/certifications">Sertifikasi</a></span>
            </li>
        @endif
        @if (Auth::check())
            <li
                class="flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none lg:hidden">
                <span class="my-1 ml-2 font-bold"><a href="/forum">Forum</a></span>
            </li>
        @endif
        @if (Auth::check())
            @if (Auth::user()->role_id == '1')
                <li
                    class="flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none lg:hidden">
                    <span class="my-1 ml-2 font-bold"><a href="/manager">Admin Manager</a></span>
                </li>
            @endif
        @endif
        {{-- IF USER SUDAH DAFTAR/LOGIN --}}
        <li
            class="ml-2 mt-2 flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none">

        </li>
        @if (Auth::check())
            @auth
                <a href="/profile/{{ auth()->user()->username }}" class="my-2 flex items-center">

                    <div
                        class="ml-2 flex w-12 cursor-pointer rounded border-2 border-transparent text-sm transition duration-150 ease-in-out focus:border-white focus:outline-none">
                        <img class="h-10 w-10 rounded object-cover"
                            src={{ asset('uploads/profile_images/' . Auth::user()->profile_img) }}
                            alt="{{ Auth::user()->username }}'s Profile Picture" />
                    </div>
                    <p class="ml-2 cursor-pointer text-base leading-6">{{ auth()->user()->username }}</p>
                    <div class="relative text-white sm:ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-chevron-down cursor-pointer" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"></path>
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>
                </a>
            @endauth
            <div class="grid grid-cols-2 items-start px-4 pb-2 md:flex md:flex-col lg:flex-row lg:items-center">
                <div class="flex w-full items-center">
                    <li
                        class="mx-auto flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none lg:hidden">
                        <span class="my-1 px-2 font-bold"><a href="/profile/edit">Profil Saya</a></span>
                    </li>

                </div>
                <div class="ml-0 flex w-full items-end lg:ml-12 lg:mt-0">
                    <li
                        class="mx-auto flex cursor-pointer items-center py-2 text-sm leading-3 tracking-normal text-gray-600 hover:bg-gray-200 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="my-1 px-2 font-bold">Logout</button>
                        </form>
                    </li>
                </div>
            </div>
        @else
            {{-- IF USER SUDAH DAFTAR/LOGIN --}}

            <li
                class="ml-2 cursor-pointer pb-4 pt-2 text-base leading-3 tracking-normal text-gray-600 hover:text-indigo-600 focus:text-indigo-600 focus:outline-none">
                <a href="/login"
                    class="hover:bg-selected focus:bg-selected focus:shadow-outline my-2 rounded-lg border border-solid bg-transparent px-8 py-2 text-sm font-semibold hover:text-gray-900 focus:text-gray-900 focus:outline-none md:my-0 md:ml-4 md:mt-0">Login</a>
                <a href="/signup"
                    class="hover:bg-selected focus:bg-selected focus:shadow-outline my-2 rounded-lg border border-solid bg-transparent px-8 py-2 text-sm font-semibold hover:text-gray-900 focus:text-gray-900 focus:outline-none md:my-0 md:ml-4 md:mt-0">Daftar</a>
            </li>
        @endif
    </ul>
    <div>
        <div class="show-m-menu mx-4 lg:hidden" onclick="MenuHandler(this,true)">

            <svg aria-haspopup="true" aria-label="Main Menu" xmlns="http://www.w3.org/2000/svg" height="1.5em"
                viewBox="0 0 512 512">
                <path
                    d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
            </svg>
        </div>
        <div onclick="MenuHandler(this,false)" class="close-m-menu mx-4 hidden">
            <svg aria-label="Close" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </div>
    </div>
</div>
{{-- MOBILE DESIGN --}}
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
    //Dynamic Highlight
    document.addEventListener("DOMContentLoaded", function() {
        // Get the current URL or route
        var currentUrl = window.location.pathname;

        // Get the <a> elements
        var homeLink = document.getElementById("home-link");
        var coursesLink = document.getElementById("courses-link");
        var certificationsLink = document.getElementById("certifications-link");
        var forumsLink = document.getElementById("forums-link");
        var managerLink = document.getElementById("manager-link");
        var profileLink = document.getElementById("profile-link");
        // Function to extract the base URL
        function getBaseUrl(url) {
            var parts = url.split('/');
            return '/' + parts[1]; // The first part after splitting
        }

        // Extract the base URL
        var baseUrl = getBaseUrl(currentUrl);

        // Check the current URL and add the active class accordingly
        switch (baseUrl) {

            case "/courses":
                coursesLink.parentElement.classList.add("border-b-2", "border-indigo-600", "text-indigo-600");
                break;
            case "/certifications":
                certificationsLink.parentElement.classList.add("border-b-2", "border-indigo-600",
                    "text-indigo-600");
                break;
            case "/forum":
                forumsLink.parentElement.classList.add("border-b-2", "border-indigo-600",
                    "text-indigo-600");
                break;
            case "/manager":
                managerLink.parentElement.classList.add("border-b-2", "border-indigo-600", "text-indigo-600");
                break;
            case "/profile":
                profileLink.parentElement.classList.add("border-b-2", "border-indigo-600", "text-indigo-600");
                break;
            case "/editProfile":
                profileLink.parentElement.classList.add("border-b-2", "border-indigo-600", "text-indigo-600");
                break;
            default:
                homeLink.parentElement.classList.add("border-b-2", "border-indigo-600", "text-indigo-600");
                break;
        }
    });
</script>
