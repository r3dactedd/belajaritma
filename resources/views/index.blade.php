<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <section class="overflow-y-scroll bg-white xl:h-screen">
        <div class="mx-auto flex h-full flex-col-reverse justify-center lg:flex-row">
            <div class="flex w-full justify-center bg-white lg:w-1/2">
                <div class="mb-12 flex flex-col justify-center text-gray-800 sm:mb-0">
                    <div class="flex flex-col items-center justify-center px-5 pt-12 sm:px-10 lg:pt-0">
                        <div class="mt-8 flex flex-col">
                            <h1 class="text-lg font-semibold leading-tight">Login</label>
                        </div>
                    </div>
                    <div class="mt-8 w-full px-5 sm:px-6">
                        <div class="mt-8 flex flex-col">
                            <label for="email" class="text-lg font-semibold leading-tight">Email</label>
                            <input id="email" class="mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                type="text" />
                            <p class="mt-2 text-sm text-red-600">
                                <span>error1</span>
                            </p>
                        </div>
                        <div class="mt-5 flex flex-col">
                            <label for="password" class="fleading-tight text-lg font-semibold">Password</label>
                            <input id="password" class="mt-2 h-10 w-full rounded border border-gray-400 px-5 sm:px-6"
                                type="text" />
                            <p class="mt-2 text-sm text-red-600">
                                <span>error2</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex w-full justify-between px-5 pt-6 sm:px-6">
                        <div class="flex items-center">
                            <input id="rememberme" class="mr-2 h-3 w-3" type="checkbox" />
                            <label for="rememberme" class="text-xs">Remember Me</label>
                        </div>
                        <a class="text-xs text-teal-400" href="#">Forgot Password?</a>
                    </div>
                    <div class="px-5 sm:mb-16 sm:px-6">
                        <button href="/home"
                            class="mt-6 w-full rounded bg-teal-400 px-8 py-3 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500">
                            Login
                        </button>
                        <p class="mt-6 text-xs">
                            Don’t Have An Account?
                            <a class="text-teal-400 underline" href="/create">Sign Up</a>
                        </p>
                        <p class="mt-6 text-xs">

                            <a class="text-teal-400 underline" href="/home">HOME NOW</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="relative flex w-full flex-col justify-center bg-yellow-600 bg-cover bg-center bg-no-repeat px-5 py-40 sm:px-12 sm:py-48 lg:w-1/2"
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
