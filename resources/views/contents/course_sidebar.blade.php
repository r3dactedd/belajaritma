<html>


<div class="flex flex-col overflow-hidden bg-white">
    <ul class="flex flex-col py-4">
        @foreach ($sidebars as $sidebar)
            @if ($sidebar->parent_id == null)
                <!-- Ini adalah parent -->
                <li>
                    <div class="transition hover:bg-indigo-50">
                        <div class="accordion-header ml-4 flex h-16 cursor-pointer items-center space-x-5 px-5 transition">
                            <div class="-ml-3 -mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                </svg>
                            </div>
                            <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
                                <path
                                    d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
                            </svg>
                            <a href="/material/{{ $sidebar->title }}/{{ $sidebar->material_id }}"
                                class="text-md ml-2 font-normal text-gray-600 hover:underline">{{ $sidebar->title }}</a>
                        </div>

                        <div class="accordion-content max-h-0 overflow-hidden px-5 pt-0">
                            <ul class="ml-12 list-inside space-y-2 pb-4">
                                @foreach ($sidebars as $child)
                                    @if ($child->parent_id == $sidebar->id)
                                        <!-- Ini adalah child -->
                                        <li>
                                            <div class="flex items-center">
                                                <!-- If done, add check-->
                                                <svg id="check" class="-ml-4" xmlns="http://www.w3.org/2000/svg"
                                                    height="1em" viewBox="0 0 512 512">
                                                    <path
                                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z" />
                                                </svg>
                                                <a href="/material/{{ $child->title }}/{{ $child->material_content_id }}"
                                                    class="text-md ml-2 font-normal text-gray-600 hover:underline">
                                                    {{ $child->title }}
                                                </a>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>
</div>

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
