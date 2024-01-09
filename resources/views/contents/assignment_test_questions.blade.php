<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
</head>

<body class="bg-gray-200 pb-12">
    @section('title', 'Homepage')
    @extends('layout.layout')

    @section('content')

        <div class="container mx-auto my-4 p-4">
            <div class="no-wrap my-4 md:-mx-2 md:flex">
                <div class="md:mx-2 md:w-4/12">
                    <!-- Sidebar, pass value courselistnya aja-->
                    <div class="rounded-xl border-4 border-green-400 bg-white p-2 md:flex md:flex-col">
                        <div class="flex flex-col overflow-hidden bg-white">
                            <div class="my-2 grid grid-cols-4">
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($questionList as $index)
                                    <a href='/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $index->id }}/{{ $type }}'
                                        class="mx-1 my-2 flex items-center justify-center rounded-md bg-indigo-500 py-2 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">

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
                    <div class="my-2 w-full h-fit rounded-md bg-white shadow  md:w-9/12">
                        <div class="h-full ml-4 py-4 flex items-end lg:ml-8 lg:mt-0">

                            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512">
                                <path
                                    d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                            </svg>
                            <p class="ml-2 text-center text-base font-bold tracking-normal text-gray-600">
                                20.00
                            </p>
                        </div>
                    </div>
                </div>
                {{-- QUESTION --}}
                <div id="asg-top" class="my-4"></div>
                <div class="w-2xl mx-4 rounded-xl bg-white md:mx-12 md:w-8/12">
                    {{-- QUESTION TEXT --}}
                    <div class="mx-auto p-6 antialiased">
                        <div class="space-y-4">
                            <h1
                                class="relative mx-6 mb-6 block w-auto pt-6 text-base font-semibold tracking-normal text-gray-800 lg:text-xl">
                                {{ $currentQuestionNumber }}. {{ $questionDetail->questions }}
                            </h1>

                            @if ($questionDetail->question_img != null && $type == 'assignment')
                                <img src={{ asset('uploads/asg_question_img/' . $questionDetail->question_img) }}
                                    alt="course image" class="h-full w-full object-cover" />
                            @endif

                            @if ($questionDetail->question_img != null && $type == 'finalTest')
                                <img src={{ asset('uploads/final_question_img/' . $questionDetail->question_img) }}
                                    alt="course image" class="h-full w-full object-cover" />
                            @endif

                            <div class="pl-12">
                                <div class="question-group">
                                    <div class="mb-4 mr-4 flex items-center">

                                        <label for="radio1-a" class="flex cursor-pointer items-center text-base">
                                            <input class="mr-3" id="radio1-a" type="radio" name="radio1"
                                                data-question="{{ $question_id }}" value="A" />
                                            {{ $questionDetail->jawaban_a }}</label>
                                    </div>

                                    <div class="mb-4 mr-4 flex items-center">

                                        <label for="radio1-b" class="flex cursor-pointer items-center text-base">
                                            <input class="mr-3" id="radio1-b" value="B" type="radio"
                                                name="radio1" data-question="{{ $question_id }}" />
                                            {{ $questionDetail->jawaban_b }}</label>
                                    </div>

                                    <div class="mb-4 mr-4 flex items-center">

                                        <label for="radio1-c" class="flex cursor-pointer items-center text-base">
                                            <input class="mr-3" id="radio1-c" value="C" type="radio"
                                                name="radio1" data-question="{{ $question_id }}" />
                                            {{ $questionDetail->jawaban_c }}</label>
                                    </div>

                                    <div class="mb-4 mr-4 flex items-center">

                                        <label for="radio1-d" class="flex cursor-pointer items-center text-base">
                                            <input class="mr-3" id="radio1-d" value="D" type="radio"
                                                name="radio1" data-question="{{ $question_id }}" />
                                            {{ $questionDetail->jawaban_d }}
                                        </label>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="mx-auto p-6 antialiased">
                        <div class="grid grid-cols-2">
                            @if ($question_id > $firstQuestion->id)
                                <a id="tombol-sebelumnya"
                                    href="/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $question_id - 1 }}/{{ $type }}"
                                    class="y-4 mx-auto mr-4 mt-4 hidden items-center rounded-md bg-indigo-500 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:flex">
                                    <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                    </svg>
                                    <span class="mx-2">Sebelumnya
                                    </span>
                                </a>
                            @endif
                            @if ($question_id == $latestQuestion->id)
                                <input type="hidden" name="courseId" value="{{ $id }}">
                                <input type="hidden" name="materialId" value="{{ $material_id }}">
                                <button id="submit-button"
                                    class="y-4 mx-auto ml-4 mt-4 hidden rounded-md bg-red-500 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:flex">
                                    <span class="mx-2">Submit</span>
                                </button>
                            @endif
                            @if ($question_id < $latestQuestion->id)
                                <a id="tombol-selanjutnya"
                                    href="/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $question_id + 1 }}/{{ $type }}"
                                    class="y-4 mx-auto ml-4 mt-4 hidden items-center rounded-md bg-indigo-500 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:flex">

                                    <svg class="mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" height="1em"
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
        {{-- window.location.href = '/courses/material/' + $title + $id + $material_id  + $type + '/results'; --}}
        <input type="hidden" id="title" name="title" value="{{ $title }}">
        <input type="hidden" id="id" name="id" value="{{ $id }}">
        <input type="hidden" id="material_id" name="material_id" value="{{ $material_id }}">
        <input type="hidden" id="type" name="type" value="{{ $type }}">

        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const nextButton = document.getElementById('tombol-selanjutnya');
                const previousButton = document.getElementById('tombol-sebelumnya');
                const submitButton = document.getElementById('submit-button');
                const userAnswers = JSON.parse(sessionStorage.getItem('userAnswers')) || [];

                function validateAnswers() {
                    // Lakukan validasi apakah semua soal telah terisi
                    // Anda dapat menggunakan data dari userAnswers untuk melakukan validasi
                    return userAnswers.every(answer => answer.answer !== undefined && answer.answer !== null);
                }

                if (nextButton) {
                    nextButton.addEventListener('click', function() {
                        const selectedAnswer = document.querySelector('input[name="radio1"]:checked');
                        const questionId = selectedAnswer ? selectedAnswer.getAttribute('data-question') : null;

                        if (questionId) {
                            const answerData = {
                                questionId: questionId,
                                answer: selectedAnswer.value,
                                answerDetail: selectedAnswer.parentElement.textContent.trim(),
                            };

                            const existingAnswerIndex = userAnswers.findIndex(ans => ans.questionId ===
                                questionId);

                            if (existingAnswerIndex !== -1) {
                                // Ganti jawaban jika questionId sudah ada di dalam array
                                userAnswers[existingAnswerIndex] = answerData;
                            } else {
                                // Tambahkan jawaban baru jika questionId belum ada di dalam array
                                userAnswers.push(answerData);
                            }

                            // Simpan array jawaban pengguna ke session storage
                            sessionStorage.setItem('userAnswers', JSON.stringify(userAnswers));

                            updateRadioButtons();
                            console.log("array", userAnswers)
                            // Ganti isi pertanyaan dan jawaban di dalam HTML dengan data yang diterima dari server
                            // ...

                        } else {
                            alert('Pilih jawaban terlebih dahulu.');
                        }
                    });
                }

                if (previousButton) {
                    previousButton.addEventListener('click', function() {
                        const selectedAnswer = document.querySelector('input[name="radio1"]:checked');
                        const questionId = selectedAnswer ? selectedAnswer.getAttribute('data-question') : null;

                        if (questionId) {
                            const answerData = {
                                questionId: questionId,
                                answer: selectedAnswer.value,
                                answerDetail: selectedAnswer.parentElement.textContent.trim(),
                            };

                            const existingAnswerIndex = userAnswers.findIndex(ans => ans.questionId ===
                                questionId);

                            if (existingAnswerIndex !== -1) {
                                // Ganti jawaban jika questionId sudah ada di dalam array
                                userAnswers[existingAnswerIndex] = answerData;
                            } else {
                                // Tambahkan jawaban baru jika questionId belum ada di dalam array
                                userAnswers.push(answerData);
                            }

                            // Simpan array jawaban pengguna ke session storage
                            sessionStorage.setItem('userAnswers', JSON.stringify(userAnswers));

                            updateRadioButtons();
                            console.log("array", userAnswers)
                            // Ganti isi pertanyaan dan jawaban di dalam HTML dengan data yang diterima dari server
                            // ...

                        } else {
                            alert('Pilih jawaban terlebih dahulu.');
                        }
                    });
                }



                if (submitButton) {
                    submitButton.addEventListener('click', function(event) {
                        event.preventDefault();
                        const selectedAnswer = document.querySelector('input[name="radio1"]:checked');
                        const questionId = selectedAnswer ? selectedAnswer.getAttribute('data-question') : null;

                        var title = document.getElementById('title').value;
                        console.log("ini title: ", title)

                        var courseId = document.getElementById('id').value;
                        console.log("ini isian courseId: ", courseId)

                        var materialId = document.getElementById('material_id').value;
                        console.log("ini isian materialId: ", materialId)

                        var type = document.getElementById('type').value;
                        console.log("ini type: ", type)

                        if (questionId) {
                            const answerData = {
                                questionId: questionId,
                                answer: selectedAnswer.value,
                                answerDetail: selectedAnswer.parentElement.textContent.trim(),
                            };

                            const existingAnswerIndex = userAnswers.findIndex(ans => ans.questionId ===
                                questionId);

                            if (existingAnswerIndex !== -1) {
                                userAnswers[existingAnswerIndex] = answerData;
                            } else {
                                userAnswers.push(answerData);
                            }

                            sessionStorage.setItem('userAnswers', JSON.stringify(userAnswers));

                            updateRadioButtons();

                            const isConfirmed = window.confirm('Apakah Anda yakin ingin mengumpulkan jawaban?');

                            if (isConfirmed) {
                                if (validateAnswers()) {
                                    // If validation is successful, send the submission data to the controller
                                    const submissionData = {
                                        answers: userAnswers.map(answer => ({
                                            questionId: answer.questionId,
                                            answer: answer.answer,
                                            answerDetail: answer.answerDetail,
                                        })),
                                        courseId: document.querySelector('input[name="courseId"]').value,
                                        materialId: document.querySelector('input[name="materialId"]')
                                            .value,
                                    };

                                    // Use fetch API to make a POST request
                                    fetch('/submit-answers', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': document.head.querySelector(
                                                    'meta[name="csrf-token"]').content,
                                            },
                                            body: JSON.stringify(submissionData),
                                        })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Network response was not ok');
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            // Handle the response from the server if needed
                                            if (data.message === 'Success') {
                                                // Tangani respons JSON jika permintaan berasal dari AJAX
                                                console.log(data
                                                    .data
                                                ); // Lakukan sesuatu dengan data JSON yang diterima
                                                clearSelectedAnswers();
                                                // Redirect ke halaman assignment_test_results
                                                window.location.href = '/courses/material/' + courseId +
                                                    '/' + materialId + '/' + type + '/score'
                                            } else {
                                                // Tangani respons HTML jika permintaan bukan dari AJAX
                                                console.log(
                                                    data); // Lakukan sesuatu dengan HTML yang diterima
                                            }
                                            console.log(data);
                                        })
                                        .catch(error => {
                                            // Use the error parameter instead of response
                                            // Check if the response is HTML (error page) and handle accordingly
                                            if (error.headers && error.headers.get('content-type').includes(
                                                    'text/html')) {
                                                console.error('Server returned HTML:', error.statusText);
                                            } else {
                                                console.error(
                                                    'There was a problem with the fetch operation:',
                                                    error);
                                            }
                                        });
                                } else {
                                    alert(
                                        'Masih ada soal yang belum terisi. Silakan isi semua soal sebelum mengumpulkan jawaban.'
                                    );
                                }
                            }
                        } else {
                            alert('Pilih jawaban terlebih dahulu.');
                        }
                    });
                }


                // submitButton.addEventListener('click', function(){

                //     warning("Apakah anda ingin mengumpulkan jawaban?")
                // })

                function updateRadioButtons() {
                    const radioButtons = document.querySelectorAll('input[name="radio1"]');

                    radioButtons.forEach(radioButton => {
                        const questionId = radioButton.getAttribute('data-question');
                        const userAnswer = userAnswers.find(ans => ans.questionId === questionId);

                        console.log('Question ID:', questionId);
                        console.log('User Answer:', userAnswer);
                        console.log('Chosen Answer:', userAnswer.answer);
                        console.log('Radio Button Value:', radioButton.value);

                        if (userAnswer.answer == radioButton.value) {
                            // Set status checked if the answer exists
                            console.log('THIS MUST BE CHECKED');
                            radioButton.checked = true;
                        } else {
                            // If the answer does not exist, ensure the radio button is unchecked
                            console.log('NOT CHOSEN');
                            radioButton.checked = false;
                        }
                    });
                }


                updateRadioButtons();

                function clearSelectedAnswers() {
                    const radioButtons = document.querySelectorAll('input[name="radio1"]');
                    radioButtons.forEach(radioButton => {
                        radioButton.checked = false;
                    });

                    // Clear the userAnswers array
                    sessionStorage.removeItem('userAnswers');
                }
            });
        </script>
    </body>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
