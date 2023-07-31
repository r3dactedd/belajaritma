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
    <div class="hidden rounded-xl border-4 border-green-400 bg-white p-2 md:flex md:flex-col">
        <div class="flex flex-col overflow-hidden bg-white">
            <ul class="flex flex-col py-4">
                <li>
                    <a href="#"
                        class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                        <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                                class="bx bx-home"></i></span>
                        <span class="text-sm font-medium">Sesi 1: Session Title</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                        <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                                class="bx bx-music"></i></span>
                        <span class="text-sm font-medium">Sesi 2: Session Title</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                        <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                                class="bx bx-drink"></i></span>
                        <span class="text-sm font-medium">Sesi 3: Session Title</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                        <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                                class="bx bx-shopping-bag"></i></span>
                        <span class="text-sm font-medium">Shopping</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                        <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                                class="bx bx-chat"></i></span>
                        <span class="text-sm font-medium">Chat</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                        <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                                class="bx bx-user"></i></span>
                        <span class="text-sm font-medium">Profile</span>
                    </a>
                </li>

            </ul>

        </div>
        <button
            class="m-4 flex items-center rounded-xl bg-teal-400 p-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">

            <div class="mx-2"> Tambah Materi </div>
        </button>
    </div>
</body>
