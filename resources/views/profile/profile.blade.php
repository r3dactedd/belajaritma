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

        <div class="" style="background-image: url('/background_image/bg-profile.svg')">

            <div class="container mx-auto p-4">
                <div class="my-4 px-4 md:flex">
                    <div class="w-full md:w-3/12">
                        <!-- Profile Card -->

                        <div class="h-80 w-auto">
                            <img class="h-80 w-80 rounded-full object-cover" src="{{ $profileImageUrl }}" id="pfp"
                                alt="{{ Auth::user()->username }}'s Profile Picture" />

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
                                        {{ $searchUser->username }}
                                    </h1>
                                    <h2
                                        class="pr-2 pt-2 text-center text-lg tracking-normal text-white md:pr-4 md:pt-4 md:text-left lg:text-xl">
                                        {{ $searchUser->full_name }}
                                    </h2>
                                    @if ($searchUser->id == auth()->user()->id)
                                        <h2
                                            class="pr-2 pt-2 text-center text-lg tracking-normal text-white md:pr-4 md:pt-4 md:text-left lg:text-xl">
                                            {{ $searchUser->email }}
                                        </h2>
                                    @endif
                                    @if ($searchUser->about_me != null)
                                        <h2
                                            class="text-md mt-12 pr-2 pt-2 text-center tracking-normal text-white md:pr-4 md:text-left lg:text-lg">
                                            Tentang Saya
                                        </h2>

                                        <h2
                                            class="text-md mt-4 pr-2 pt-2 text-center font-light tracking-normal text-white md:pr-4 md:text-left lg:text-lg">
                                            {{ $searchUser->about_me }}
                                        </h2>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="my-4"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container mx-auto mb-1 flex h-full w-11/12 items-center border-b-2 border-gray-300 px-2">

            <ul class="h-full items-center lg:flex">
                <li
                    class="text-md my-4 flex h-full cursor-pointer items-center font-bold tracking-normal text-gray-800 md:my-1">
                    <a id="profileDashboard">Statistika</a>
                </li>
                <li
                    class="md:my-1text-md my-4 ml-0 mr-10 flex h-full cursor-pointer items-center font-bold tracking-normal text-gray-800 md:ml-10">
                    <a id="profileCourses">Kursus</a>
                </li>
                <li
                    class="text-md my-4 mr-10 flex h-full cursor-pointer items-center font-bold tracking-normal text-gray-800 md:my-1">
                    <a id="profileCerti">Sertifikasi</a>
                </li>
                @if ($searchUser->id == auth()->user()->id)
                    <li
                        class="text-md my-4 mr-10 flex h-full cursor-pointer items-center font-bold tracking-normal text-gray-800 md:my-1">
                        <a id="profileHistory">Riwayat Transaksi</a>
                    </li>
                @endif
            </ul>

        </div>

        <div id="dashboard">
            @include('profile.profile_dashboard')
        </div>
        <div id="certifications" style="display: none;">
            @include('profile.profile_certilist')
        </div>
        <div id="courses" style="display: none;">
            @include('profile.profile_courselist')
        </div>
        <div id="history" style="display: none;">
            @include('profile.profile_history')
        </div>

        </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var element = document.getElementById("profileDashboard");
            var pfp = document.getElementById("pfp").src;
            console.log(pfp)

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
                $("#history").hide();
                $("#dashboard").show();
            });

            $("#profileCourses").click(function() {
                $("#dashboard").hide();
                $("#certifications").hide();
                $("#history").hide();
                $("#courses").show();
            });

            $("#profileCerti").click(function() {
                $("#dashboard").hide();
                $("#courses").hide();
                $("#history").hide();
                $("#certifications").show();
            });
            $("#profileHistory").click(function() {
                $("#dashboard").hide();
                $("#courses").hide();
                $("#certifications").hide();
                $("#history").show();
            });
        });
    </script>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
