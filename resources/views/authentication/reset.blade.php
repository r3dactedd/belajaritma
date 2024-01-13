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
    <section class="overflow-y-scroll bg-gray-200 xl:h-screen">
        <div class="mx-auto flex h-full flex-col justify-center lg:flex-row">
            <div class="flex w-full justify-center">
                <div class="mx-4 mb-12 flex flex-col justify-center text-gray-800 sm:mb-0">
                    <div class="rounded-xl bg-white px-6 py-2 md:px-12">
                        <h1 class="mt-12 text-center text-4xl font-semibold md:mt-8">Membuat Password Baru</h1>
                        <h1 class="my-4 text-center text-lg font-light">Anda dapat mengisi password baru untuk akun
                            anda.</h1>

                        <main class="form-reset mt-5 w-fit px-5 sm:px-6">
                            <form action="{{ route('resetPost') }}" method="POST">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-floating mb-3">
                                    <label for="email" class="font-semibold">Email Akun</label>
                                    <input id="email-input" type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 text-gray-600 sm:px-6"
                                        id="email" style="border-radius:10px;" value="{{ $email ?? old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <label for="password" class="font-semibold">Password Baru</label>
                                    <label for="password" class="text-sm leading-tight"> (6-30
                                        Karakter)</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                        id="password" style="border-radius:10px;"
                                        placeholder="Input password baru yang akan dipakai" required>

                                    @error('password')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <label for="password_confirmation" class="font-semibold">Konfirmasi Password</label>
                                    <label for="password_confirmation" class="text-sm leading-tight"> (Harus sama dengan
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

                                <div class="form-floating mb-3">
                                    <div class="px-5 sm:mb-16 sm:px-6">
                                        <button type="submit"
                                            class="mt-6 w-full rounded bg-indigo-400 px-8 py-3 text-sm text-white transition duration-150 ease-in-out hover:bg-indigo-600 group-invalid:pointer-events-none group-invalid:opacity-30">
                                            Reset Password Anda
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </main>
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>
<script>
    document.getElementById("email-input").value = {{ $email }};
</script>

</html>
