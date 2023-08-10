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
    @section('title', 'Edit Profile')
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
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Pengaturan</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-5 p-5">
            {{-- EDIT PROFILE --}}
            <div class="mx-auto rounded-xl bg-white px-4 py-8">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Profile</h2>
                <form action="/editProfile" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                        <div class="w-full">
                            <label for="profilePicture"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Profile Picture</label>
                            <input type="file" name="profile_img" id="inputPicture"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Choose Image File" required="">
                            {{-- @error('profile_img')
                                <p>{{ $message }}</p>
                            @enderror --}}
                        </div>
                        <div class="sm:col-span-2">
                            <label for="username" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                Username</label>
                            <input type="text" name="username" id="inputUsername"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Username" required="">
                            {{-- @error('username')
                                <p>{{ $message }}</p>
                            @enderror --}}

                        </div>
                        <div class="sm:col-span-2">
                            <label for="firstName" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                                Lengkap</label>
                            <input type="text" name="first_name" id="inputFirstName"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Nama Lengkap" required="">
                            {{-- @error('first_name')
                                <p>{{ $message }}</p>
                            @enderror --}}

                        </div>

                        <div class="w-full">
                            <label for="email"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" id="inputEmail"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Email" required="">
                            {{-- @error('email')
                                <p>{{ $message }}</p>
                            @enderror --}}
                        </div>
                        <div class="w-full">
                            <label for="password"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="inputPassword"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Enter New Password" required="">
                            {{-- @error('password')
                                <p>{{ $message }}</p>
                            @enderror --}}
                        </div>

                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit" class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>
            {{-- EDIT PASSWORD --}}
            <div class="mt-8"></div>
            <div class="mx-auto rounded-xl bg-white px-4 py-8">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Profile</h2>
                <form action="/editProfile" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">


                        <div class="sm:col-span-2">
                            <label for="email"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" id="inputEmail"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Email" required="">
                            {{-- @error('email')
                                <p>{{ $message }}</p>
                            @enderror --}}
                        </div>
                        <div class="sm:col-span-2">
                            <label for="password"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="inputPassword"
                                class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                placeholder="Enter New Password" required="">
                            {{-- @error('password')
                                <p>{{ $message }}</p>
                            @enderror --}}
                        </div>

                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
        {{--  --}}
    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection

</html>
