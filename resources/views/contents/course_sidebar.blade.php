<html>

<div class="hidden rounded-xl border-4 bg-white px-4 pb-8 md:flex md:flex-col">
    <div class="flex flex-col overflow-hidden bg-white">
        <ul class="flex flex-col py-4">
            @foreach ($sidebars as $sidebar)
                @if ($sidebar->parent_id == null)
                    <!-- Ini adalah parent -->
                    <li>
                        <div
                            class="{{ $userCourseDetail->last_accessed_material == $sidebar->material_id ? 'bg-green-100 transition hover:bg-indigo-300' : 'transition hover:bg-green-100' }}">
                            <div
                                class="accordion-header ml-4 flex h-16 cursor-pointer items-center space-x-5 px-5 transition">
                                @if ($sidebar->user_is_locked == true && $sidebar->user_is_visible == false)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M10 16c0-1.104.896-2 2-2s2 .896 2 2c0 .738-.404 1.376-1 1.723v2.277h-2v-2.277c-.596-.347-1-.985-1-1.723zm11-6v14h-18v-14h3v-4c0-3.313 2.687-6 6-6s6 2.687 6 6v4h3zm-13 0h8v-4c0-2.206-1.795-4-4-4s-4 1.794-4 4v4zm11 2h-14v10h14v-10z" />
                                    </svg>

                                    <span class="text-gray-1000 ml-2 text-base font-normal">{{ $sidebar->title }}</span>
                                @endif
                                @if ($sidebar->user_is_locked == true && $sidebar->user_is_visible == true)
                                    <a href="/courses/material/{{ $sidebar->title }}/{{ $sidebar->course_id }}/{{ $sidebar->material_id }}"
                                        class="ml-2 text-base font-normal text-gray-600 hover:underline">
                                        {{ $sidebar->title }}</a>
                                @endif
                                @if ($sidebar->user_is_locked == false && $sidebar->user_is_visible == true)
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                    </svg>
                                    <a href="/courses/material/{{ $sidebar->title }}/{{ $sidebar->course_id }}/{{ $sidebar->material_id }}"
                                        class="ml-2 text-base font-normal text-gray-600 hover:underline">
                                        {{ $sidebar->title }}</a>
                                @endif

                            </div>


                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <a href='/forum/course/{{ $id }}'
        class="y-4 mx-auto mt-4 hidden w-6/12 min-w-[70%] items-center justify-center rounded-md bg-indigo-500 px-2 py-4 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:flex">


        <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
            <path
                d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9c.1-.2 .2-.3 .3-.5z" />
        </svg>
        <span class="mx-2 items-center">Akses Forum
        </span>
    </a>
</div>
{{-- MOBILE TOGGLE --}}
<div
    class="cursor-pointer text-gray-700 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none lg:hidden">
    <ul class="absolute left-0 top-0.5 z-[1035] mt-16 hidden rounded border-r bg-white p-2 shadow md:mt-16">
        <div onclick="MenuHandler(this,false)" class="close-m-menu hidden">
            <svg aria-label="Close" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </div>
        <li>

            <div class="transition hover:bg-indigo-50">

                <div class="flex flex-col overflow-hidden bg-white">
                    <ul class="flex flex-col py-4">
                        @foreach ($sidebars as $sidebar)
                            @if ($sidebar->parent_id == null)
                                <!-- Ini adalah parent -->
                                <li>
                                    <div
                                        class="{{ $userCourseDetail->last_accessed_material == $sidebar->material_id ? 'bg-green-100 transition hover:bg-indigo-300' : 'transition hover:bg-green-100' }}">
                                        <div
                                            class="accordion-header ml-4 flex h-16 cursor-pointer items-center space-x-5 px-5 transition">
                                            @if ($sidebar->user_is_locked == true && $sidebar->user_is_visible == false)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M10 16c0-1.104.896-2 2-2s2 .896 2 2c0 .738-.404 1.376-1 1.723v2.277h-2v-2.277c-.596-.347-1-.985-1-1.723zm11-6v14h-18v-14h3v-4c0-3.313 2.687-6 6-6s6 2.687 6 6v4h3zm-13 0h8v-4c0-2.206-1.795-4-4-4s-4 1.794-4 4v4zm11 2h-14v10h14v-10z" />
                                                </svg>

                                                <span class="text-gray-1000 ml-2 text-base font-normal">{{ $sidebar->title }}</span>
                                            @endif
                                            @if ($sidebar->user_is_locked == true && $sidebar->user_is_visible == true)
                                                <a href="/courses/material/{{ $sidebar->title }}/{{ $sidebar->course_id }}/{{ $sidebar->material_id }}"
                                                    class="ml-2 text-base font-normal text-gray-600 hover:underline">
                                                    {{ $sidebar->title }}</a>
                                            @endif
                                            @if ($sidebar->user_is_locked == false && $sidebar->user_is_visible == true)
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                    <path
                                                        d="M369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                </svg>
                                                <a href="/courses/material/{{ $sidebar->title }}/{{ $sidebar->course_id }}/{{ $sidebar->material_id }}"
                                                    class="ml-2 text-base font-normal text-gray-600 hover:underline">
                                                    {{ $sidebar->title }}</a>
                                            @endif

                                        </div>


                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <a href='/forum/course/{{ $id }}'
                    class="y-4 mx-auto mt-4 hidden w-6/12 min-w-[70%] items-center justify-center rounded-md bg-indigo-500 px-2 py-4 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:flex">


                    <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <path
                            d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160s-83.3-160-208-160S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8 .2-1.6 .3-2.4 .5c-4.4 .8-8.7 1.5-13.2 1.9c-.2 0-.5 .1-.7 .1c-5.1 .5-10.2 .8-15.3 .8c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9c.1-.2 .2-.3 .3-.5z" />
                    </svg>
                    <span class="mx-2 items-center">Akses Forum
                    </span>
                </a>


            </div>
        </li>
    </ul>
    <div>
        <div class="show-m-menu mx-4 lg:hidden" onclick="MenuHandler(this,true)">
            <svg aria-haspopup="true" aria-label="Main Menu" xmlns="http://www.w3.org/2000/svg"
                class="icon icon-tabler icon-tabler-menu" width="32" height="32" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="#2C3E50" fill="none" stroke-linecap="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="4" y1="8" x2="20" y2="8" />
                <line x1="4" y1="16" x2="20" y2="16" />
            </svg>
        </div>
        <div onclick="MenuHandler(this,false)" class="close-m-menu hidden">
            <svg aria-label="Close" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <line x1="18" y1="6" x2="6" y2="18" />
                <line x1="6" y1="6" x2="18" y2="18" />
            </svg>
        </div>
    </div>
</div>
{{-- MOBILE TOGGLE --}}

</html>

<style>
    #sortbox:checked~#sortboxmenu {
        opacity: 1;
    }

    .checklist-done {}

    .accordion-content {
        transition: max-height 0.3s ease-out, padding 0.3s ease;
    }
</style>
<script>
    const accordionHeader = document.querySelectorAll(".accordion-header");
    accordionHeader.forEach((header) => {
        header.addEventListener("click", function() {
            const accordionContent = header.parentElement.querySelector(".accordion-content");
            let accordionMaxHeight = accordionContent.style.maxHeight;

            // Condition handling
            if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
                accordionContent.style.maxHeight = `${accordionContent.scrollHeight + 32}px`;
                header.querySelector(".fas").classList.remove("fa-plus");
                header.querySelector(".fas").classList.add("fa-minus");
                header.parentElement.classList.add("bg-indigo-50");
            } else {
                accordionContent.style.maxHeight = `0px`;
                header.querySelector(".fas").classList.add("fa-plus");
                header.querySelector(".fas").classList.remove("fa-minus");
                header.parentElement.classList.remove("bg-indigo-50");
            }
        });
    });


    document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
    };
</script>
