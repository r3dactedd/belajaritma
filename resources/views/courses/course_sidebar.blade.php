<style>
    #sortbox:checked~#sortboxmenu {
        opacity: 1;
    }

    .checklist-done {}
</style>
<div class="hidden rounded-xl border-4 border-green-400 bg-white p-2 md:flex md:flex-col">
    <div class="flex flex-col overflow-hidden bg-white">
        <ul class="flex flex-col py-4">
            <li>
                <a href="/courses/1/pdf"
                    class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                    <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                            class="bx bx-home"></i></span>
                    <div class="flex items-center">
                        <svg class="-ml-4" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">

                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                        </svg>
                        <p class="ml-2 text-sm font-normal text-gray-600">
                            Sesi 1: Session Title
                        </p>
                    </div>
                </a>

                <a href="/courses/2/video"
                    class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                    <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                            class="bx bx-home"></i></span>
                    <div class="flex items-center">
                        {{-- Buat hiddennya hilang pas sudah selesai --}}
                        <svg class="-ml-4 hidden" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 512 512">

                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                        </svg>
                        {{-- Buat hiddennya hilang pas sudah selesai --}}
                        <p class="ml-2 text-sm font-normal text-gray-600">
                            Sesi 2: Session Title
                        </p>
                    </div>
                </a>
                <a href="/courses/3/asg"
                    class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                    <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                            class="bx bx-drink"></i></span>
                    <div class="flex items-center">
                        {{-- Buat hiddennya hilang pas sudah selesai --}}
                        <svg class="-ml-4 hidden" xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 512 512">

                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                        </svg>
                        {{-- Buat hiddennya hilang pas sudah selesai --}}
                        <p class="ml-2 text-sm font-normal text-gray-600">
                            Sesi 3: Session Title
                        </p>
                    </div>
                </a>
            </li>
        </ul>
    </div>

</div>
{{-- <button
    class="m-4 hidden items-center rounded-xl bg-teal-400 p-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:flex">

    <div class="mx-2"> Tambah Materi </div>
</button> --}}
