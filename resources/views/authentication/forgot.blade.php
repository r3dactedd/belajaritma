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
            <div class="flex w-full justify-center bg-white">
                <div class="mx-4 mb-12 flex flex-col justify-center text-gray-800 sm:mb-0">
                    <h1 class="mt-12 text-center text-4xl font-semibold md:mt-8">Lupa Password</h1>

                    <main id="inputEmail" class="form-reset mt-5 w-fit px-5 sm:px-6">
                        <h1 class="mb-8 text-center text-lg font-light">Anda dapat melakukan reset password
                            disini.</h1>
                        <form method="post" action="/login">
                            @csrf
                            <div class="form-floating mb-3">
                                <label for="email" class="font-semibold">Email</label>
                                <label for="first_name" class="text-sm leading-tight"> (Input
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
                                <div class="px-5 sm:mb-16 sm:px-6">
                                    <button type="submit" onclick="resend()"
                                        class="mt-6 w-full rounded bg-indigo-400 px-8 py-3 text-sm text-white transition duration-150 ease-in-out hover:bg-indigo-600 group-invalid:pointer-events-none group-invalid:opacity-30">
                                        Kirim Link Reset
                                    </button>
                                    <p class="mt-6 text-xs">
                                        <a class="text-indigo-400 underline" href="/login"> Balik ke Login</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </main>
                    <main id="resendEmail" class="resend mt-5 hidden w-fit px-5 sm:px-6">
                        <h1 class="mx-auto mb-8 text-center text-lg font-light">Link Reset Password telah dikirim
                            ke Email anda.
                        </h1>
                        <h1 class="mx-auto my-4 text-center text-lg font-light">
                            Anda dapat menekan tombol di email untuk melakukan reset password.
                        </h1>
                        <form method="post" action="/login">
                            <div class="form-floating mb-3">
                                <div class="px-5 sm:mb-16 sm:px-6">
                                    <button type="submit" onclick="resend()"
                                        class="mt-6 w-full rounded bg-indigo-400 px-8 py-3 text-sm text-white transition duration-150 ease-in-out hover:bg-indigo-600 group-invalid:pointer-events-none group-invalid:opacity-30">
                                        Kirim Ulang Email Reset
                                    </button>
                                    <p class="mt-6 text-xs">
                                        <a class="text-indigo-400 underline" href="/login"> Balik ke Login</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </section>
    <script>
        function resend() {
            const input = document.getElementById('inputEmail');
            const resend = document.getElementById('resendEmail');

            input.classList.add('hidden')
            resend.classList.remove('hidden')

        }
    </script>
</body>

</html>
