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
                    <h1 class="mt-12 text-center text-4xl font-semibold md:mt-8">Daftar</h1>
                    <h1 class="my-4 text-center text-lg font-light">Mulailah perjalanan programming kamu sekarang juga.
                    </h1>
                    <main class="form-registration mt-5 px-5 sm:px-6">
                        <form action="/signup" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <label for="first_name" class="font-semibold">Nama Lengkap</label>
                                <label for="first_name" class="text-sm leading-tight text-red-500"> (Input
                                    details)</label>
                                <input type="text" name="full_name"
                                    class="form-control mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                    id="first_name" style=" border-radius:10px;" placeholder="Nama Pertama" required
                                    value="{{ old('first_name') }}" autofocus>

                                {{-- @error('first_name') is-invalid @enderror
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                            </div>


                            <div class="form-floating mb-3">
                                <label for="username" class="font-semibold">Username</label>
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
                                <label for="email" class="font-semibold">Email</label>
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
                                <label for="password" class="font-semibold">Password</label>
                                <label for="first_name" class="text-sm leading-tight text-red-500"> (Length detail
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
                                <label for="password_confirmation" class="font-semibold">Konfirmasi Password</label>
                                <label for="first_name" class="text-sm leading-tight text-red-500"> (Harus sama dengan
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
                                    class="mt-6 w-full rounded bg-indigo-400 px-8 py-3 text-sm text-white transition duration-150 ease-in-out hover:bg-indigo-600 group-invalid:pointer-events-none group-invalid:opacity-30">
                                    Daftar Akun
                                </button>
                                <p class="mt-6 text-xs">
                                    Sudah memiliki akun?
                                    <a class="text-indigo-400 underline" href="/login">Login</a>
                                </p>
                            </div>
                        </form>
                    </main>


                </div>
            </div>
            <div class="relative hidden h-screen w-full flex-col justify-center bg-indigo-600 bg-cover bg-center bg-no-repeat px-5 py-40 sm:px-12 sm:py-48 md:flex lg:w-1/2"
                style="background-image: url('https://miro.medium.com/v2/resize:fit:1400/0*0f5eeUtoLQbDw89b');opacity:0.9">
                <div class="absolute right-0 top-0 pr-3 pt-3 text-white">
                    <?xml version="1.0 " encoding="UTF-8 "?>

                </div>
                <div class="relative z-30 flex flex-col justify-center bg-gray-900 px-4 py-6">
                    <h3 class="text-5xl font-extrabold leading-tight text-white">
                        Selamat Datang di <br /> Belajaritma
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
