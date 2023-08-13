<style>
    #sortbox:checked~#sortboxmenu {
        opacity: 1;
    }
</style>
<div class="hidden rounded-xl border-4 border-green-400 bg-white p-2 md:flex md:flex-col">
    <div class="flex flex-col overflow-hidden bg-white">
        <ul class="flex flex-col py-4">
            <li>

                {{-- <a href="#"
                    class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                    <input type="checkbox" id="sortbox" class="absolute hidden"><i class="bx bx-home"></i></span>
                    <span class="text-sm font-medium">Drop Test</span>
                    <div id="sortboxmenu"
                        class="absolute right-1 top-full z-10 mt-1 min-w-max rounded border border-gray-400 bg-gray-300 opacity-0 shadow transition delay-75 ease-in-out">
                        <ul class="block text-right text-gray-900">
                            <li><a href="#" class="block px-3 py-2 hover:bg-gray-200">Featured</a></li>
                            <li><a href="#" class="block px-3 py-2 hover:bg-gray-200">Newest</a></li>
                            <li><a href="#" class="block px-3 py-2 hover:bg-gray-200">Price: Low to High</a></li>
                            <li><a href="#" class="block px-3 py-2 hover:bg-gray-200">Price: High to Low</a></li>
                        </ul>
                    </div>
                </a> --}}
                <a href="/courses/1/pdf"
                    class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                    <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                            class="bx bx-home"></i></span>
                    <span class="text-sm font-medium">Sesi 1: Session Title</span>
                </a>
                <a href="/courses/2/video"
                    class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                    <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                            class="bx bx-music"></i></span>
                    <span class="text-sm font-medium">Sesi 2: Session Title</span>
                </a>
                <a href="/courses/3/asg"
                    class="flex h-12 transform flex-row items-center text-gray-500 transition-transform duration-200 ease-in hover:translate-x-2 hover:text-gray-800">
                    <span class="inline-flex h-12 w-8 items-center justify-center text-lg text-gray-400"><i
                            class="bx bx-drink"></i></span>
                    <span class="text-sm font-medium">Sesi 3: Session Title</span>
                </a>
            </li>
        </ul>
    </div>

</div>
{{-- <button
    class="m-4 hidden items-center rounded-xl bg-teal-400 p-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:flex">

    <div class="mx-2"> Tambah Materi </div>
</button> --}}
