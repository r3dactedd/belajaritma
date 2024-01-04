<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
</head>

<body class="pb-12 bg-gray-200">
    @section('title', 'Homepage')
    @extends('layout.layout')

    @section('content')

    <div class="container p-4 mx-auto my-4">
        <div class="my-4 no-wrap md:-mx-2 md:flex">
            <div class="md:mx-2 md:w-4/12">
                <!-- Sidebar, pass value courselistnya aja-->
                <div class="p-2 bg-white border-4 border-green-400 rounded-xl md:flex md:flex-col">
                    <div class="flex flex-col overflow-hidden bg-white">
                        <div class="grid grid-cols-4 my-2">
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($questionList as $index)
                            <a href='/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $index->id }}/{{ $type }}'
                                class="flex items-center justify-center py-2 mx-1 my-2 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md hover:bg-yellow-500 focus:outline-none">

                                <span class="items-center"> {{ $count }}
                                </span>
                            </a>
                            @php
                            $count += 1;
                            @endphp
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
            {{-- QUESTION --}}
            <div id="asg-top" class="my-4"></div>
            <div class="mx-4 bg-white w-2xl rounded-xl md:mx-12 md:w-8/12">
                {{-- QUESTION TEXT --}}
                <div class="p-6 mx-auto antialiased">
                    <div class="space-y-4">
                        <h1
                            class="relative block w-auto pt-6 mx-6 mb-6 text-base font-semibold tracking-normal text-gray-800 lg:text-xl">
                            {{{ $currentQuestionNumber }}}. {{ $questionDetail->questions }}
                        </h1>

                        @if ($questionDetail->question_img != null && $type == 'assignment')
                        <img src={{ asset('uploads/asg_question_img/' . $questionDetail->question_img) }}
                        alt="course image" class="object-cover w-full h-full" />
                        @endif

                        @if ($questionDetail->question_img != null && $type == 'finalTest')
                        <img src={{ asset('uploads/final_question_img/' . $questionDetail->question_img) }}
                        alt="course image" class="object-cover w-full h-full" />
                        @endif

                        <div class="pl-12">

                            <div class="flex items-center mb-4 mr-4">
                                <input id="radio1-a" type="radio" name="radio1" class="hidden"
                                    data-question="{{ $question_id }}" value="A" />
                                <label for="radio1-a" class="flex items-center text-base cursor-pointer">
                                    <span
                                        class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                    {{ $questionDetail->jawaban_a }}</label>
                            </div>

                            <div class="flex items-center mb-4 mr-4">
                                <input id="radio1-b" value="B" type="radio" name="radio1" class="hidden"
                                    data-question="{{ $question_id }}" />
                                <label for="radio1-b" class="flex items-center text-base cursor-pointer">
                                    <span
                                        class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                    {{ $questionDetail->jawaban_b }}</label>
                            </div>

                            <div class="flex items-center mb-4 mr-4">
                                <input id="radio1-c" value="C" type="radio" name="radio1" class="hidden"
                                    data-question="{{ $question_id }}" />
                                <label for="radio1-c" class="flex items-center text-base cursor-pointer">
                                    <span
                                        class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                    {{ $questionDetail->jawaban_c }}</label>
                            </div>

                            <div class="flex items-center mb-4 mr-4">
                                <input id="radio1-d" value="D" type="radio" name="radio1" class="hidden"
                                    data-question="{{ $question_id }}" />
                                <label for="radio1-d" class="flex items-center text-base cursor-pointer">
                                    <span
                                        class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                    {{ $questionDetail->jawaban_d }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>


                <div class="p-6 mx-auto antialiased">
                    <div class="grid grid-cols-2">
                        @if ($question_id > $firstQuestion->id)
                        <a href="/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $question_id - 1 }}/{{ $type }}"
                            class="items-center hidden px-4 py-3 mx-auto mt-4 mr-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:flex">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 448 512">
                                <path
                                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                            </svg>
                            <span class="mx-2">Sebelumnya
                            </span>
                        </a>
                        @endif
                        @if ($question_id == $latestQuestion->id)
                        <a href=""
                            class="items-center hidden px-4 py-3 mx-auto mt-4 ml-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-red-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:flex">

                            <span class="mx-2">Submit
                            </span>
                        </a>
                        @endif
                        @if ($question_id < $latestQuestion->id)
                            <a href="/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $question_id + 1 }}/{{ $type }}"
                                class="items-center hidden px-4 py-3 mx-auto mt-4 ml-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:flex">

                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 448 512">
                                    <path
                                        d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                                </svg>
                                <span class="mx-2">Selanjutnya
                                </span>
                            </a>
                            @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script>
        // Inisialisasi variabel untuk menyimpan jawaban sementara
        const userAnswers = {};

// Fungsi untuk menyimpan jawaban
    function saveUserAnswer(question, answer) {
        userAnswers[question] = answer;
        console.log(`Saved answer for question ${question}: ${answer}`);
        console.log('Updated userAnswers:', userAnswers);
    }

        document.querySelectorAll('input[type="radio"]').forEach((radio) => {
        radio.addEventListener('change', function () {
            const questionNumber = this.getAttribute('data-question');
            const selectedAnswer = this.value;
            saveUserAnswer(questionNumber, selectedAnswer);
        });
    });

    // Fungsi untuk mendapatkan jawaban pengguna
    function getUserAnswer(question) {
        return userAnswers[question];
    }
    console.log("SCRIPT LOADED")
    </script>
</body>
@endsection
@section('footer')
@include('layout.footer')
@endsection

</html>
