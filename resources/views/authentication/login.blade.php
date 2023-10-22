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
</head>

<body>
    <section class="overflow-y-scroll bg-white xl:h-screen">
        <div class="mx-auto flex h-full flex-col justify-center lg:flex-row">
            <div class="flex w-full justify-center bg-white lg:w-1/2">
                <div class="mx-4 mb-12 flex flex-col justify-center text-gray-800 sm:mb-0 md:w-1/2">


                    <h1 class="mt-12 text-center text-4xl font-semibold md:mt-8">Masuk</h1>
                    <h1 class="my-4 text-center text-lg font-light">Selamat datang kembali di Belajaritma!</h1>
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- pesan login salah --}}
                    @if (session()->has('loginError'))
                        <div class="relative rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700"
                            role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <main class="form-signin mt-5 w-fit px-5 sm:px-6">
                        <form method="post" action="/login">
                            @csrf


                            <div class="form-floating mb-3">
                                <label for="email" class="font-semibold">Email</label>

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

                            <div class="form-floating mb-3">
                                <label for="email" class="font-semibold">Password</label>

                                <input type="password" name="password"
                                    class="form-control mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    style="border-radius:10px; " id="password" placeholder="Input Password anda"
                                    required>

                            </div>

                            <div class="form-floating mb-3">
                                <div class="flex w-full justify-between px-5 pt-6 sm:px-6">
                                    <div class="flex items-center">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember"
                                            checked={{ Cookie::get('rememberMe') !== null }}>
                                        <label for="rememberme" class="ml-1 text-xs"> Ingat Saya</label>
                                    </div>
                                </div>
                                <div class="px-5 sm:mb-16 sm:px-6">
                                    <button type="submit"
                                        class="mt-6 w-full rounded bg-indigo-400 px-8 py-3 text-sm text-white transition duration-150 ease-in-out hover:bg-indigo-600 group-invalid:pointer-events-none group-invalid:opacity-30">
                                        Login
                                    </button>
                                    <p class="mt-6 text-sm">
                                        Tidak memiliki akun?
                                        <a class="text-indigo-400 underline" href="/signup"> Daftar</a>
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

</html>
