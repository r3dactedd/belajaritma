<div class="container mx-auto my-4 pb-4">

    <div
        class="mx-auto grid w-5/6 grid-cols-2 items-start pb-6 pr-4 md:ml-20 md:flex md:w-full md:flex-col lg:flex-row lg:items-center">
        <div class="flex items-center">
            <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                <a id="registeredButton"
                    class="bg-selected inline-block rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Belum
                    Diselesaikan</a>
            </p>
        </div>
        <div class="flex items-center">
            <p class="ml-4 text-lg font-bold leading-5 tracking-normal text-indigo-600">
                <a id="passedButton"
                    class="bg-selected inline-block rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Sertifikasi
                    Selesai</a>
            </p>
        </div>
    </div>
    <div class="container mx-auto mb-12 grid w-11/12 gap-8 pb-12 sm:grid-cols-1 md:grid-cols-2">
        @foreach ($registeredCertification as $registration)
            @php
                $isPassed = $passedCertification->contains('certif_id', $registration->id);
            @endphp
            @if ($registration)
                <a href="/certifications/{{ $registration->id }}" class="certif-card"
                    data-completed="{{ $isPassed ? '1' : '0' }}">

                    <div
                        class="min-h-max cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="lg:w-3/2 w-full">
                            <div class="p-6">
                                <div class="my-2 bg-white md:flex md:h-36">
                                    <!-- Left Side -->
                                    <div class="h-full bg-white py-2 md:ml-4">
                                        <div class="mx-auto h-full w-full">
                                            <img class="h-full"
                                                src="https://www.pewresearch.org/internet/wp-content/uploads/sites/9/2017/02/PI_2017.02.08_Algorithms_featured.png"
                                                alt="e" />
                                        </div>
                                    </div>

                                    <!-- Right Side -->
                                    <div class="h-auto w-full md:mx-2 md:w-3/5">
                                        <div class="bg-white px-4 py-2">
                                            <h1 class="text-xl font-bold tracking-normal text-gray-800 lg:text-3xl">
                                                {{ $registration->certification->certif_title }}
                                            </h1>

                                        </div>
                                    </div>
                                </div>
                                <p class="text-md mb-6 w-11/12 px-4 font-normal tracking-normal text-gray-600">
                                    {{ $registration->certification->certif_desc }}
                                </p>
                                <div
                                    class="grid grid-cols-2 items-start px-4 pb-6 md:flex md:flex-col lg:flex-row lg:items-center">

                                    <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512">
                                            <path
                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                            {{ $registration->certification->certif_duration }} Jam
                                        </p>
                                    </div>
                                    <div class="ml-0 mt-4 flex items-end lg:ml-12 lg:mt-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 640 512">
                                            <path
                                                d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                        </svg>
                                        <p class="ml-2 text-center text-sm font-normal tracking-normal text-gray-600">
                                            120
                                            Siswa
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
        {{-- Course Components --}}
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var registeredButton = document.getElementById('registeredButton');
            var passedButton = document.getElementById('passedButton');
            var courseCards = document.querySelectorAll('.certif-card');

            registeredButton.addEventListener('click', function() {
                courseCards.forEach(function(card) {
                    var isPassed = card.dataset.completed;
                    console.log('Course ID:', card.getAttribute('href'), 'Completed:', isPassed);

                    card.style.display = isPassed === '0' ? 'block' : 'none';
                });
            });

            passedButton.addEventListener('click', function() {
                courseCards.forEach(function(card) {
                    var isPassed = card.dataset.completed;
                    console.log('Course ID:', card.getAttribute('href'), 'Completed:', isPassed);

                    card.style.display = isPassed === '1' ? 'block' : 'none';
                });
            });
        });
    </script>
</div>
