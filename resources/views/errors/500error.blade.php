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


<body class="bg-gray-200 pb-12">
    @section('title', 'Homepage')
    @extends('layout.layout')
    <div class="container mx-auto my-12 grid w-11/12 grid-cols-1 gap-8 px-4 pb-12">


        <div
            class="min-h-max cursor-pointer rounded-xl border border-gray-200 bg-white py-8 shadow transition duration-150 ease-in-out hover:shadow-lg">
            <div class="flex flex-col items-center">
                <div class="text-3xl font-bold text-indigo-500 md:text-6xl">
                    500 Error
                </div>

                <div class="mt-10 text-center text-xl font-bold md:text-4xl">
                    Server Error
                </div>

                <div class="mt-8 text-base font-medium text-gray-400 md:text-xl">
                    <a onclick="history.back()" class="mt-4 flex items-center text-center" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                            <path
                                d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                        </svg>
                        <span class="mb-1 ml-2">Mohon maaf, server error. Silahkan refresh page ini lagi.
                        </span>
                    </a>


                </div>
            </div>
        </div>
        </a>
    </div>
    @section('footer')
        @include('layout.footer')
    @endsection
</body>

</html>
