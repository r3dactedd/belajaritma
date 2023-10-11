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
                <div class="mx-4 mb-12 flex flex-col justify-center text-gray-800 sm:mb-0">


                    <h1 class="mt-12 text-center text-4xl font-semibold md:mt-8">Masuk</h1>
                    <h1 class="text-md text-center font-light">Selamat datang kembali di Belajaritma!</h1>
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
                    <main class="form-signin mt-5 px-5 sm:px-6">
                        <form method="post" action="/login">
                            @csrf


                            <div class="form-floating mb-3">
                                <label for="email" class="text-lg font-semibold leading-tight">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    id="email" style="border-radius:10px;" placeholder="name@example.com" autofocus
                                    required value="{{ old('email') }}">

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="email" class="text-lg font-semibold leading-tight">Password</label>
                                <input type="password" name="password"
                                    class="form-control h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    style="border-radius:10px; " id="password" placeholder="Password" required>

                            </div>


                            <div class="flex w-full justify-between px-5 pt-6 sm:px-6">
                                <div class="flex items-center">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember"
                                        checked={{ Cookie::get('rememberMe') !== null }}>
                                    <label for="rememberme" class="ml-1 text-xs"> Ingat Saya</label>
                                </div>
                            </div>
                            <div class="px-5 sm:mb-16 sm:px-6">
                                <button type="submit"
                                    class="mt-6 w-full rounded bg-yellow-400 px-8 py-3 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 group-invalid:pointer-events-none group-invalid:opacity-30">
                                    Login
                                </button>
                                <p class="mt-6 text-xs">
                                    Tidak memiliki akun?
                                    <a class="text-yellow-400 underline" href="/signup"> Daftar</a>
                                </p>
                            </div>
                        </form>
                    </main>


                </div>
            </div>
            <div class="relative flex h-screen w-full flex-col justify-center bg-yellow-600 bg-cover bg-center bg-no-repeat px-5 py-40 sm:px-12 sm:py-48 lg:w-1/2"
                style="background-image: url('https://miro.medium.com/v2/resize:fit:1400/0*0f5eeUtoLQbDw89b');opacity: 0.75;">
                <div class="absolute right-0 top-0 pr-3 pt-3 text-white">
                    <?xml version="1.0 " encoding="UTF-8 "?>

                </div>
                <div class="relative z-30 flex flex-col justify-center pl-4 md:pl-24 md:pr-12 xl:pr-12">
                    <h3 class="text-5xl font-extrabold leading-tight text-white">
                        Selamat Datang di <br /> BelajaRitma
                    </h3>
                    <p class="pt-3 text-xl leading-tight text-white xl:w-10/12">
                        Anywhere, anytime. Enjoy risk-free with our 30-day, money-back guarantee.
                    </p>
                </div>
                <div class="absolute bottom-0 left-0 z-20 pb-3 pl-3 text-white">
                    <?xml version="1.0 " encoding="UTF-8 "?>

                </div>
            </div>
        </div>
    </section>
</body>

</html>
