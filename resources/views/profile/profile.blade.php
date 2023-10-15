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
    @section('title', 'My Profile')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')

        <div class="bg-white px-6 sm:px-12">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>
                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Profil Saya</span>
                        </a>
                </div>
            </div>
        </div>

        <div class="" style="background-image: url(/storage/image/bg-profile.svg)">
            <div class="container mx-auto p-4">
                <div class="my-4 px-4 md:flex">
                    <div class="w-full md:w-3/12">
                        <div class="h-80 w-auto">
                            <img class="h-80 w-80 rounded-full object-cover" src="/storage/image/forumtest.png">
                        </div>
                    </div>
                    <div class="my-4"></div>
                    <!-- Right Side -->
                    <div class="h-full w-full md:w-9/12">
                        <div class="rounded-xl bg-none p-3">
                            <div class="md:mx-2 md:w-3/4">
                                <div class="rounded-xl bg-none px-4 py-2 md:pr-8">
                                    <h1
                                        class="d pr-2 pt-2 text-center text-xl font-bold tracking-normal text-white md:pr-4 md:pt-8 md:text-left lg:text-3xl">
                                        Username
                                    </h1>
                                    <h2
                                        class="pr-2 pt-2 text-center text-lg tracking-normal text-white md:pr-4 md:pt-4 md:text-left lg:text-xl">
                                        Email@gmail.com
                                    </h2>
                                    <h2
                                        class="text-md mt-8 pr-2 pt-2 text-center tracking-normal text-white md:pr-4 md:text-left lg:text-lg">
                                        Tentang Saya
                                    </h2>
                                    <h2
                                        class="text-md mt-4 pr-2 pt-2 text-center font-light tracking-normal text-white md:pr-4 md:text-left lg:text-lg">
                                        INSERT TENTANG SAYA THINGS HERE Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="my-4"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container mx-auto mb-1 mt-4 flex h-full w-11/12 items-center border-b-2 border-gray-300 px-2">

            <ul class="hidden h-full items-center lg:flex">
                <li class="text-md flex h-full cursor-pointer items-center font-bold tracking-normal text-gray-800">
                    <a id="profileDashboard">Dashboard</a>
                </li>
                <li class="text-md mx-10 flex h-full cursor-pointer items-center font-bold tracking-normal text-gray-800">
                    <a id="profileCourses">Kursus</a>
                </li>
                <li class="text-md mr-10 flex h-full cursor-pointer items-center font-bold tracking-normal text-gray-800">
                    <a id="profileCerti">Sertifikasi</a>
                </li>
            </ul>

        </div>

        <div id="dashboard">
            @include('profile.profile_dashboard')
        </div>
        <div id="courses" style="display: none;">
            @include('profile.profile_courselist')
        </div>
        <div id="certifications" style="display: none;">
            @include('profile.profile_certilist')
        </div>
        </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var element = document.getElementById("profileDashboard");

            // Add an event listener to run your onClick function when clicked
            element.addEventListener("click", function() {
                // Your onClick function logic here
                // For example, alert a message when clicked
                element.classList.add("border-b-2", "border-indigo-600", "text-indigo-600");
            });

            // Simulate a click event on the element
            element.click();

            const anchorElements = document.querySelectorAll("ul li a");
            // Add a click event listener to each anchor element
            anchorElements.forEach((anchor) => {
                anchor.addEventListener("click", function() {
                    // Remove the class from all anchor elements
                    anchorElements.forEach((a) => {
                        a.classList.remove("border-b-2", "border-indigo-600",
                            "text-indigo-600");
                    });
                    // Add the class to the clicked anchor element
                    this.classList.add("border-b-2", "border-indigo-600", "text-indigo-600");
                });
            });
            $("#profileDashboard").click(function() {
                $("#courses").hide();
                $("#certifications").hide();
                $("#dashboard").show();
            });

            $("#profileCourses").click(function() {
                $("#dashboard").hide();
                $("#certifications").hide();
                $("#courses").show();
            });

            $("#profileCerti").click(function() {
                $("#dashboard").hide();
                $("#courses").hide();
                $("#certifications").show();
            });
        });
    </script>
@endsection

</html>
