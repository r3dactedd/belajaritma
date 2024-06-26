<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />

</head>

<body class="pb-12 bg-gray-200">
    @section('title', 'My Profile')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')

        <div class="px-6 bg-white sm:px-12">
            <div class="container flex flex-col items-start justify-between py-6 mx-auto md:flex-row md:items-center">
                <div>
                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a  class="flex items-center" href="#">
                           
                            <span class="mb-1 ml-2">Profil Saya</span>
                        </a>
                </div>
            </div>
        </div>

        <div class="" style="background-image: url('/background_image/bg-profile.svg')">

            <div class="container p-4 mx-auto">
                <div class="px-4 my-4 md:flex">
                    <div class="w-full md:w-3/12">


                        <div class="w-auto h-80">
                            <img class="object-cover rounded-full h-80 w-80" src="{{ $profileImageUrl }}" id="pfp"
                                alt="{{ Auth::user()->username }}'s Profile Picture" />

                        </div>
                    </div>
                    <div class="my-4"></div>
                    <!-- Right Side -->
                    <div class="w-full h-full md:w-9/12">
                        <div class="p-3 rounded-xl bg-none">
                            <div class="md:mx-2 md:w-3/4">
                                <div class="px-4 py-2 rounded-xl bg-none md:pr-8">
                                    <h1
                                        class="pt-2 pr-2 text-xl font-bold tracking-normal text-center text-white d md:pr-4 md:pt-8 md:text-left lg:text-3xl">
                                        {{ $searchUser->username }}
                                    </h1>
                                    <h2
                                        class="pt-2 pr-2 text-lg tracking-normal text-center text-white md:pr-4 md:pt-4 md:text-left lg:text-xl">
                                        {{ $searchUser->full_name }}
                                    </h2>
                                    @if ($searchUser->id == auth()->user()->id)
                                        <h2
                                            class="pt-2 pr-2 text-lg tracking-normal text-center text-white md:pr-4 md:pt-4 md:text-left lg:text-xl">
                                            {{ $searchUser->email }}
                                        </h2>
                                    @endif
                                    @if ($searchUser->about_me != null)
                                        <h2
                                            class="pt-2 pr-2 mt-12 text-base tracking-normal text-center text-white md:pr-4 md:text-left lg:text-lg">
                                            Tentang Saya
                                        </h2>

                                        <h2
                                            class="pt-2 pr-2 mt-4 text-base font-light tracking-normal text-center text-white md:pr-4 md:text-left lg:text-lg">
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
        @if (Auth::user()->role_id == '2')
            <div class="container flex items-center w-11/12 h-full px-2 mx-auto mb-1 border-b-2 border-gray-300">

                <ul class="items-center h-full lg:flex">
                    <li
                        class="flex items-center h-full my-4 text-base font-bold tracking-normal text-gray-800 cursor-pointer md:my-1">
                        <a id="profileDashboard">Statistika</a>
                    </li>
                    <li
                        class="flex items-center h-full my-4 ml-0 mr-10 font-bold tracking-normal text-gray-800 cursor-pointer md:my-1text-base md:ml-10">
                        <a id="profileCourses">Kursus</a>
                    </li>
                    <li
                        class="flex items-center h-full my-4 mr-10 text-base font-bold tracking-normal text-gray-800 cursor-pointer md:my-1">
                        <a id="profileCerti">Sertifikasi</a>
                    </li>
                    @if ($searchUser->id == auth()->user()->id)
                        <li
                            class="flex items-center h-full my-4 mr-10 text-base font-bold tracking-normal text-gray-800 cursor-pointer md:my-1">
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
        @endif
        </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var element = document.getElementById("profileDashboard");
            var pfp = document.getElementById("pfp").src;

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
