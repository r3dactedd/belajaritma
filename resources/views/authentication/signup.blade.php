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
    {{-- Flowbite for Modal popup --}}

</head>

<body>
    @section('title', 'Homepage')
    @extends('layout.layout')

    @section('content')
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
                                    <label for="full_name" class="font-semibold">Nama Anda</label>
                                    <label for="full_name" class="text-sm leading-tight"> (3-50 Karakter)</label>
                                    <input type="text" name="full_name"
                                        class="form-control mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                        id="full_name" style=" border-radius:10px;" placeholder="Input nama anda" required
                                        value="{{ old('full_name') }}" autofocus>


                                    @error('full_name')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3">
                                    <label for="username" class="font-semibold">Username</label>
                                    <label for="full_name" class="text-sm leading-tight"> (3-20 Karakter)</label>
                                    <input type="text" name="username"
                                        class="form-control @error('last_name') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                        id="username" style=" border-radius:10px;"
                                        placeholder="Input username untuk akun anda" required value="{{ old('username') }}"
                                        autofocus>

                                    @error('username')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <label for="email" class="font-semibold">Email</label>
                                    <label for="full_name" class="text-sm leading-tight"> (Input
                                        email yang valid)</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                        id="email" style="border-radius:10px;" placeholder="Input email anda" required
                                        value="{{ old('email') }}">

                                    @error('email')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <label for="password" class="font-semibold">Password</label>
                                    <label for="full_name" class="text-sm leading-tight"> (6-30 Karakter)</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                        id="password" style="border-radius:10px;"
                                        placeholder="Input password yang akan dipakai" required>
                                    @error('password')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <label for="password_confirmation" class="font-semibold">Konfirmasi Password</label>
                                    <label for="full_name" class="text-sm leading-tight"> (Harus sama dengan
                                        password)</label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control @error('password') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                        id="password_confirmation" style="border-radius:10px;"
                                        placeholder="Konfirmasi Password" required>

                                    @error('password_confirmation')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="px-5 sm:mb-16 sm:px-6">
                                    <button type="submit" data-modal-target="popup-success"
                                        data-modal-toggle="popup-success"
                                        class="mt-6 w-full rounded bg-indigo-400 px-8 py-3 text-sm text-white transition duration-150 ease-in-out hover:bg-indigo-600 group-invalid:pointer-events-none group-invalid:opacity-30">
                                        Daftar Akun
                                    </button>

                                    <p class="mt-6 text-sm">
                                        Sudah memiliki akun?
                                        <a class="text-indigo-400 underline" href="/login">Login</a>
                                    </p>
                                </div>
                            </form>
                        </main>

                    </div>
                </div>
                @include('authentication.right_banner')
            </div>



            </div>
        </section>



    </body>
@endsection

@section('footer')
    @include('layout.footer')
@endsection

</html>
