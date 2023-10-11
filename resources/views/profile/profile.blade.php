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
    @section('title', 'My Profile')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')

        <div class="bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>
                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a class="flex items-center" href="/home">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Profil Saya</span>
                        </a>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-5 p-5">
            <div class="no-wrap my-4 md:-mx-2 md:flex">
                <!-- Left Side -->
                <div class="w-full md:mx-2 md:w-3/12">
                    <!-- Profile Card -->
                    <div class="border-t-4 border-green-400 bg-white p-3">
                        <div class="mx-auto p-6 rounded-full">
                            <img src="{{ asset($imagePath) }}">
                        </div>
                    </div>
                </div>
                <div class="my-4"></div>
                <!-- Right Side -->
                <div class="h-64 w-full md:mx-2 md:w-9/12">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="rounded-sm bg-white p-3 shadow-sm">
                        <div class="text-gray-700">
                            <div class="grid text-sm md:grid-cols-2">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">First Name</div>
                                    <div class="px-4 py-2"> {{$searchUser->first_name}} </div>
                                    {{-- <div class="px-4 py-2">{{$searchUser->first_name}}</div> --}}
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Last Name</div>
                                    <div class="px-4 py-2">{{$searchUser->last_name}} </div>
                                    {{-- <div class="px-4 py-2">{{$searchUser->last_name}}</div> --}}
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Username</div>
                                    <div class="px-4 py-2"> {{$searchUser->username}}</div>
                                    {{-- <div class="px-4 py-2">{{$searchUser->username}}</div> --}}
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800" href="mailto:jane@example.com"> {{$searchUser->email}} </a>
                                        {{-- <a class="text-blue-800" href="mailto:jane@example.com">{{$searchUser->email}}</a> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- <div class="ml-4 mt-6 md:mt-0">
                            <form action="/edit" method="get">
                                <button
                                    class="mt-10 flex items-center rounded bg-blue-400 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none"
                                    action="/edit" method="get">
                                    <div class="mx-2"> Edit Profile</div>
                                </button>

                            </form>
                            <a href="/profile/1/edit"class="mt-10 flex items-center rounded bg-blue-400 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none"
                                action="/edit" method="get">
                                <div class="mx-2"> Edit Profile debug</div>
                            </a>
                        </div> --}}
                    </div>
                    <div class="my-4"></div>
                </div>
            </div>

        </div>
    </body>
@endsection

</html>
