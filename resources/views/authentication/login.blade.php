<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="./style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <section class="h-screen overflow-y-scroll bg-white">
        @section('title', 'Homepage')
        @extends('layout.layout')

        @section('content')
        <div class="flex flex-col justify-center h-full mx-auto lg:flex-row">
            <div class="flex justify-center w-full bg-white lg:w-1/2">
                <div class="flex flex-col justify-center mx-4 mt-4 mb-12 text-gray-800 sm:mb-0 md:w-1/2">
                    @if (session('success'))
                    <div id="toast-default"
                        class="flex items-center p-4 mx-auto text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400"
                        role="alert">
                        <div>
                            <svg class="w-6 h-6 text-blue-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h2 class="font-semibold text-indigo-400">{{ session('success') }}</h2>
                        </div>
                        <button type="button"
                            class="ms-autos -my-1.5 mx-auto ml-2 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                            data-dismiss-target="#toast-default" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                    @endif
                    @if(isset($warning))
                    <div class="alert alert-warning">
                        {{ $warning }}
                    </div>
                    @endif
                    <h1 class="mt-12 text-4xl font-semibold text-center md:mt-8">Masuk</h1>
                    <h1 class="my-4 text-lg font-light text-center">Selamat datang di Belajaritma!</h1>
                    {{-- pesan login salah --}}
                    @if (session()->has('loginError'))
                    <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <main class="px-5 mx-auto mt-5 form-signin w-fit sm:px-6">
                        <form method="post" action="/login">
                            @csrf
                            <div class="mb-3 form-floating">
                                <label for="email" class="font-semibold">Email</label>
                                <label for="full_name" class="text-sm leading-tight">(Input Email untuk akun
                                    anda)</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    id="email" style="border-radius:10px;" placeholder="Input email anda" autofocus
                                    required value="{{ old('email') }}">

                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="justify-center block mb-3 form-floating">
                                <label for="email" class="font-semibold">Password</label>
                                <label for="full_name" class="text-sm leading-tight">(Input Password untuk akun anda)
                                </label>
                                <input type="password" name="password"
                                    class="w-full h-10 px-5 mt-2 border border-gray-400 rounded form-control sm:px-6"
                                    style="border-radius:10px; " id="password" placeholder="Input Password anda"
                                    required>
                                @error('password_confirmation')
                                <div class="my-1 text-sm text-red-500 invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                            <div class="mb-3 form-floating">
                                <div class="flex justify-between w-full px-5 pt-6 sm:px-6">
                                    <div class="flex items-center">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember"
                                            checked={{ Cookie::get('rememberMe') !==null }}>
                                        <label for="rememberme" class="ml-1 text-xs"> Ingat Saya</label>
                                    </div>
                                </div>
                                <div class="px-5 sm:mb-16 sm:px-6">
                                    <button type="submit"
                                        class="w-full px-8 py-3 mt-6 text-sm text-white transition duration-150 ease-in-out bg-indigo-400 rounded hover:bg-indigo-600 group-invalid:pointer-events-none group-invalid:opacity-30">
                                        Login
                                    </button>
                                    <p class="mt-6 text-sm">
                                        Tidak memiliki akun?
                                        <a class="text-indigo-400 underline" href="/signup"> Daftar</a>
                                    </p>
                                    <p class="mt-6 text-sm">
                                        <a class="text-indigo-400 underline" href="/">Masuk sebagai Tamu</a>
                                    </p>
                                    <p class="mt-6 text-sm">
                                        <a class="text-indigo-400 underline" href="/forgot"> Lupa Password?</a>
                                    </p>
                                </div>
                            </div>

                        </form>
                    </main>
                </div>
            </div>
            @include('authentication.right_banner')
        </div>

    </section>
</body>

@endsection

@section('footer')
@include('layout.footer')
@endsection

</html>
