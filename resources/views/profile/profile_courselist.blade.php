<div class="container pb-4 mx-auto my-4">
    <div
        class="grid items-start w-5/6 grid-cols-2 pb-6 pr-4 mx-auto md:ml-20 md:flex md:w-full md:flex-col lg:flex-row lg:items-center">
        <div class="flex items-center">
            <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                <a id="inProgressButton"
                    class="inline-block px-4 py-2 text-sm font-semibold text-white bg-indigo-600 bg-selected rounded-xl hover:bg-green-400">Sedang
                    Dipelajari</a>
            </p>
        </div>
        <div class="flex items-center">
            <p class="ml-4 text-lg font-bold leading-5 tracking-normal text-indigo-600">
                <a id="completedButton"
                    class="inline-block px-4 py-2 text-sm font-semibold text-white bg-indigo-600 bg-selected rounded-xl hover:bg-green-400">Kursus
                    Selesai</a>
            </p>
        </div>
    </div>
    <div class="container grid w-11/12 gap-8 pb-12 mx-auto mb-12 sm:grid-cols-1 md:grid-cols-2">
        {{-- Course Components --}}
        @foreach ($enrolledCourses as $courses)
            @php
                $isCompleted = $completedCourses->contains('course_id', $courses->id);
            @endphp
            <a href="/courses/{{ $courses->id }}" class="course-card" data-completed="{{ $isCompleted ? '1' : '0' }}">

                <div
                    class="transition duration-150 ease-in-out bg-white border border-gray-200 shadow cursor-pointer min-h-max rounded-xl hover:shadow-lg">
                    <div class="w-full lg:w-3/2">
                        <div class="p-6">
                            <div class="my-2 bg-white md:flex md:h-36">
                                <!-- Left Side -->
                                <div class="h-full py-2 bg-white md:ml-4">
                                    <div class="w-full h-full mx-auto">
                                        <img class="h-full"
                                            src = "{{ asset('uploads/course_images/' . $courses->course_img) }}"
                                            alt="e" />
                                    </div>
                                </div>

                                <!-- Right Side -->
                                <div class="w-full h-auto md:mx-2 md:w-3/5">
                                    <div class="px-4 py-2 bg-white">
                                        <h1 class="text-xl font-bold tracking-normal text-gray-800 lg:text-3xl">

                                            {{ $courses->course_name }}
                                        </h1>

                                    </div>
                                </div>
                            </div>
                            <p class="w-11/12 h-16 px-4 mb-6 text-base font-normal tracking-normal text-gray-600">
                                {{ $courses->short_desc }}
                            </p>
                            <div
                                class="grid items-start grid-cols-2 px-4 pb-6 md:flex md:flex-col lg:flex-row lg:items-center">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 384 512">
                                        <path
                                            d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm56 256c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24H264c13.3 0 24-10.7 24-24s-10.7-24-24-24H120z" />
                                    </svg>
                                    <p class="ml-2 text-sm font-normal text-gray-600">
                                        {{ $courses->total_module }} Modul
                                    </p>
                                </div>
                                <div class="flex items-end ml-0 lg:ml-12 lg:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                        <path
                                            d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                    </svg>
                                    <p class="ml-2 text-sm font-normal tracking-normal text-center text-gray-600">
                                        {{ $courses->level }}
                                    </p>
                                </div>
                                <div class="flex items-end mt-4 ml-0 lg:ml-12 lg:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512">
                                        <path
                                            d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                    </svg>
                                    <p class="ml-2 text-sm font-normal tracking-normal text-center text-gray-600">
                                        {{ $courses->total_time }}
                                    </p>
                                </div>
                                <div class="flex items-end mt-4 ml-0 lg:ml-12 lg:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                        <path
                                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                    </svg>
                                    <p class="ml-2 text-sm font-normal tracking-normal text-center text-gray-600">
                                        {{ $courses->students_enrolled }}
                                        Siswa
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var inProgressButton = document.getElementById('inProgressButton');
            var completedButton = document.getElementById('completedButton');
            var courseCards = document.querySelectorAll('.course-card');

            inProgressButton.addEventListener('click', function() {
                courseCards.forEach(function(card) {
                    var isCompleted = card.dataset.completed;

                    card.style.display = isCompleted === '0' ? 'block' : 'none';
                });
            });

            completedButton.addEventListener('click', function() {
                courseCards.forEach(function(card) {
                    var isCompleted = card.dataset.completed;

                    card.style.display = isCompleted === '1' ? 'block' : 'none';
                });
            });
        });
    </script>
</div>
