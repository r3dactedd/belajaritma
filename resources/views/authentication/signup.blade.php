<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="./style.css" />
</head>

<body>
    <section class="overflow-y-scroll bg-white xl:h-screen">
        <div class="mx-auto flex h-full flex-col-reverse justify-center lg:flex-row">
            <div class="flex w-full justify-center bg-white lg:w-1/2">
                {{-- <div class="mb-12 flex flex-col justify-center text-gray-800 sm:mb-0">
                    <div class="flex flex-col items-center justify-center px-5 pt-12 sm:px-10 lg:pt-0">
                        <svg width="300px" height="100px" viewBox="0 0 384 100" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>63EC04EA-F9B5-4F76-AA27-C6D0890287B3</title>
                        </svg>
                    </div>
                    <div class="mt-8 w-full px-5 sm:px-6">
                        <div class="mt-8 flex flex-col">
                            <label for="email" class="text-lg font-semibold leading-tight">Email</label>
                            <input id="email" class="mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                type="text" />
                        </div>
                        <div class="mt-5 flex flex-col">
                            <label for="password" class="fleading-tight text-lg font-semibold">Password</label>
                            <input id="password" class="mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                type="text" />
                        </div>
                    </div>
                    <div class="flex w-full justify-between px-5 pt-6 sm:px-6">
                        <div class="flex items-center">
                            <input id="rememberme" class="mr-2 h-3 w-3" type="checkbox" />
                            <label for="rememberme" class="text-xs">Remember Me</label>
                        </div>
                        <a class="text-xs text-yellow-400" href="#">Forgot Password?</a>
                    </div>
                    <div class="px-5 sm:mb-16 sm:px-6">
                        <button
                            class="mt-6 w-full rounded bg-yellow-400 px-8 py-3 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500">
                            Login
                        </button>
                        <p class="mt-6 text-xs">
                            Already Have An Account?
                            <a class="text-yellow-400 underline" href="/login">Sign In Here</a>
                        </p>
                    </div>
                </div> --}}
                <div class="mb-12 flex flex-col justify-center px-4 text-gray-800 sm:mb-0">
                    {{-- <div class="flex flex-col items-center justify-center px-5 pt-12 sm:px-10 lg:pt-0">
                        <svg width="300px" height="100px" viewBox="0 0 384 100" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>63EC04EA-F9B5-4F76-AA27-C6D0890287B3</title>
                        </svg>
                    </div> --}}

                    <h1 class="mt-8 text-center text-4xl font-semibold">Daftar</h1>
                    <h1 class="text-md text-center font-light">Selamat datang di Belajaritma, mulailah perjalanan
                        programming kamu sekarang juga</h1>
                    <main class="form-registration mt-5">
                        <form action="/signup" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <label for="profile_img">Gambar Profil</label>
                                <label for="first_name" class="text-sm leading-tight">(Optional)</label>
                                <input id="profile_img"
                                    class="form-control @error('profile_img') is-invalid @enderror mt-2 h-10 w-full border-gray-400 px-5 sm:px-6"
                                    type="file" style="border-radius:10px;padding-top:6px" name="profile_img">

                                @error('profile_img')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="first_name">Nama Pertama</label>
                                <label for="first_name" class="text-sm leading-tight text-red-500"> (Input
                                    details)</label>
                                <input type="text" name="first_name"
                                    class="form-control @error('first_name') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    id="first_name" style=" border-radius:10px;" placeholder="Nama Pertama" required
                                    value="{{ old('first_name') }}" autofocus>

                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="lastname">Nama Belakang</label>
                                <label for="first_name" class="text-sm leading-tight text-red-500"> (Input
                                    details)</label>
                                <input type="text" name="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    id="last_name" style=" border-radius:10px;" placeholder="Nama Belakang" required
                                    value="{{ old('last_name') }}" autofocus>

                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="username">Username</label>
                                <label for="first_name" class="text-sm leading-tight text-red-500"> (Input
                                    details)</label>
                                <input type="text" name="username"
                                    class="form-control @error('last_name') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    id="username" style=" border-radius:10px;" placeholder="Username" required
                                    value="{{ old('username') }}" autofocus>

                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="email">Email</label>
                                <label for="first_name" class="text-sm leading-tight text-red-500"> (Input
                                    details)</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    id="email" style="border-radius:10px;" placeholder="name@example.com" required
                                    value="{{ old('email') }}">

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>





                            <div class="form-floating mb-3">
                                <label for="password">Kata Sandi</label>
                                <label for="first_name" class="text-sm leading-tight"> (Length detail
                                    sini)</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    id="password" style="border-radius:10px;" placeholder="Password" required>

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <label for="password_confirmation">Konfirmasi Kata Sandi</label>
                                <label for="first_name" class="text-sm leading-tight"> (Harus sama dengan
                                    password)</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    id="password_confirmation" style="border-radius:10px;"
                                    placeholder="Enter Your Confirm Password" required>

                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="px-5 sm:mb-16 sm:px-6">
                                <button type="submit"
                                    class="mt-6 w-full rounded bg-yellow-400 px-8 py-3 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 group-invalid:pointer-events-none group-invalid:opacity-30">
                                    Sign Up
                                </button>
                                <p class="mt-6 text-xs">
                                    Already Have An Account?
                                    <a class="text-yellow-400 underline" href="/login">Sign In Now</a>
                                </p>
                            </div>
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
                    <p class="py-4 text-xl leading-tight text-white xl:w-10/12">
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
