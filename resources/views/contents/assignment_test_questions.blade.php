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

<body class="pb-12 bg-gray-200">
    @section('title', 'Homepage')
    @extends('layout.layout')

    @section('content')

    <div class="container p-4 mx-auto my-4">
        <div class="my-4 no-wrap md:-mx-2 md:flex">
            <div class="md:mx-2 md:w-4/12">
                <!-- Sidebar, pass value courselistnya aja-->
                @php
                // Get shuffled question IDs from the session or shuffle if not set
                $shuffledQuestionIds = session('shuffledQuestionIds');

                // If not set or reshuffle flag is true, shuffle and store in the session
                if (!$shuffledQuestionIds || session('reshuffled')) {
                $shuffledQuestionIds = $questionList->shuffle()->pluck('id')->toArray();
                session(['shuffledQuestionIds' => $shuffledQuestionIds, 'reshuffled' => false]);
                }
                @endphp

                <!-- Sidebar, pass value courselistnya aja-->
                <div class="p-2 bg-white border-4 border-green-400 rounded-xl md:flex md:flex-col">
                    <div class="flex flex-col overflow-hidden bg-white">
                        <div class="grid grid-cols-4 my-2">
                            @foreach ($shuffledQuestionIds as $index => $shuffledQuestionId)
                            <a href='/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $shuffledQuestionId }}/{{ $type }}/2'
                                class="flex items-center justify-center py-2 mx-1 my-2 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md hover:bg-yellow-500 focus:outline-none">
                                <span class="items-center">{{ $index + 1 }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="w-full my-2 bg-white rounded-md shadow h-fit md:w-9/12">
                    <div id="countdown-timer" class="flex items-end h-full py-4 ml-4 lg:ml-8 lg:mt-0">

                        <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512">
                            <path
                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                        </svg>
                        <p id="timer-display" timer-duration="{{ $material->material_duration }}"
                            class="ml-2 text-base font-bold tracking-normal text-center text-gray-600">
                            5:00
                            <!-- Ubah nilai awal sesuai dengan material_duration -->
                        </p>
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
                            {{ $currentQuestionNumber }}. {{ $questionDetail->questions }}
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
                            <div class="question-group">
                                <div class="flex items-center mb-4 mr-4">

                                    <label for="radio1-a" class="flex items-center text-base cursor-pointer">
                                        <input class="mr-3" id="radio1-a" type="radio" name="radio1"
                                            data-question="{{ $question_id }}" value="A" />
                                        {{ $questionDetail->jawaban_a }}</label>
                                </div>

                                <div class="flex items-center mb-4 mr-4">

                                    <label for="radio1-b" class="flex items-center text-base cursor-pointer">
                                        <input class="mr-3" id="radio1-b" value="B" type="radio" name="radio1"
                                            data-question="{{ $question_id }}" />
                                        {{ $questionDetail->jawaban_b }}</label>
                                </div>

                                <div class="flex items-center mb-4 mr-4">

                                    <label for="radio1-c" class="flex items-center text-base cursor-pointer">
                                        <input class="mr-3" id="radio1-c" value="C" type="radio" name="radio1"
                                            data-question="{{ $question_id }}" />
                                        {{ $questionDetail->jawaban_c }}</label>
                                </div>

                                <div class="flex items-center mb-4 mr-4">

                                    <label for="radio1-d" class="flex items-center text-base cursor-pointer">
                                        <input class="mr-3" id="radio1-d" value="D" type="radio" name="radio1"
                                            data-question="{{ $question_id }}" />
                                        {{ $questionDetail->jawaban_d }}
                                    </label>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <hr>


                <div class="p-6 mx-auto antialiased">
                    <div class="grid grid-cols-2">
                        @if ($currentQuestionIndex > 0)
                        <a id="tombol-sebelumnya"
                            href="/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $previousQuestionId }}/{{ $type }}/2"
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
                        @if ($isLastQuestion)
                        <input type="hidden" name="courseId" value="{{ $id }}">
                        <input type="hidden" name="materialId" value="{{ $material_id }}">
                        <button id="submit-button"
                            class="hidden px-4 py-3 mx-auto mt-4 ml-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-red-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:flex">
                            <span class="mx-2">Submit</span>
                        </button>
                        @endif
                        @if (!$isLastQuestion)
                        <a id="tombol-selanjutnya"
                            href="/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $nextQuestionId }}/{{ $type }}/2"
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
    {{-- window.location.href = '/courses/material/' + $title + $id + $material_id + $type + '/results'; --}}
    <input type="hidden" id="title" name="title" value="{{ $title }}">
    <input type="hidden" id="id" name="id" value="{{ $id }}">
    <input type="hidden" id="material_id" name="material_id" value="{{ $material_id }}">
    <input type="hidden" id="type" name="type" value="{{ $type }}">
    <input type="hidden" id="question_id" name="type" value="{{ $question_id }}">
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                const nextButton = document.getElementById('tombol-selanjutnya');
                const previousButton = document.getElementById('tombol-sebelumnya');
                const submitButton = document.getElementById('submit-button');
                // sessionStorage.removeItem('userAnswers');
                const userAnswers = JSON.parse(sessionStorage.getItem('userAnswers')) || [];
                const timerDisplay = document.getElementById('timer-display');
                const timerDuration = timerDisplay.getAttribute('timer-duration');
                console.log("ini timer duration", timerDuration)
                const totalSeconds =  parseInt(timerDuration) * 60 - 1;

                function convertTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
}

    let timeIsUp = false;
    function startTimer(duration) {
    let timer;
    // localStorage.removeItem('timer');
    const storedTime = localStorage.getItem('timer');
    console.log("ini timer saat ini", storedTime)

    if (storedTime !== null) {
        // Hapus nilai 'timer' dari localStorage
        localStorage.removeItem('timer');
        timer = parseInt(storedTime, 10);
    } else {
        timer = duration;
    }

    const updateTimerDisplay = function () {
        timerDisplay.textContent = convertTime(timer);
        if (timer > 0) {
            timer--;
            localStorage.setItem('timer', timer.toString());
        } else {
            clearInterval(timerInterval);
            localStorage.removeItem('timer');
            timeIsUp = true;

            // Gumpulkan jawaban dan tampilkan alert waktu habis
            submitAnswers();
            alert('Waktu telah habis. Jawaban Anda sudah otomatis terkumpul.');
        }
    };

    const timerInterval = setInterval(updateTimerDisplay, 1000);

    updateTimerDisplay();
}

startTimer(totalSeconds);

                function validateAnswers() {
                    // Lakukan validasi apakah semua soal telah terisi
                    // Anda dapat menggunakan data dari userAnswers untuk melakukan validasi
                    return userAnswers.every(answer => answer.answer !== undefined && answer.answer !== null && answer.answer !== '');
                }

                if (nextButton) {
                    nextButton.addEventListener('click', function() {
                        const selectedAnswer = document.querySelector('input[name="radio1"]:checked');
                        const questionId = document.getElementById('question_id').value;

                    if (questionId) {
                    // Cek apakah questionId sudah ada di dalam userAnswers
                    const existingAnswerIndex = userAnswers.findIndex(ans => ans.questionId === questionId);

                        if (existingAnswerIndex !== -1) {
                            // Jika sudah ada, update jawabannya
                            userAnswers[existingAnswerIndex].answer = selectedAnswer ? selectedAnswer.value : '';
                            userAnswers[existingAnswerIndex].answerDetail = selectedAnswer ? selectedAnswer.parentElement.textContent.trim() : '';
                        } else {
                            // Jika belum ada, tambahkan jawaban baru
                            const answerData = {
                                questionId: questionId,
                                answer: selectedAnswer ? selectedAnswer.value : '', // Jawaban kosong jika tidak ada yang dipilih
                                answerDetail: selectedAnswer ? selectedAnswer.parentElement.textContent.trim() : '',
                            };
                            userAnswers.push(answerData);
                        }

                    // Simpan array jawaban pengguna ke session storage
                            sessionStorage.setItem('userAnswers', JSON.stringify(userAnswers));

                            updateRadioButtons();
                            console.log("array", userAnswers);
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


                function submitAnswers(){
                    const selectedAnswer = document.querySelector('input[name="radio1"]:checked');
                    const questionId = document.getElementById('question_id').value;

                        var title = document.getElementById('title').value;
                        console.log("ini title: ", title)

                        console.log(userAnswers)

                        var courseId = document.getElementById('id').value;
                        console.log("ini isian courseId: ", courseId)

                        var materialId = document.getElementById('material_id').value;
                        console.log("ini isian materialId: ", materialId)

                        var type = document.getElementById('type').value;
                        console.log("ini type: ", type)

                        if (questionId) {

                                const existingAnswerIndex = userAnswers.findIndex(ans => ans.questionId === questionId);

                            if (existingAnswerIndex !== -1) {
                                // Jika sudah ada, update jawabannya
                                userAnswers[existingAnswerIndex].answer = selectedAnswer ? selectedAnswer.value : '';
                                userAnswers[existingAnswerIndex].answerDetail = selectedAnswer ? selectedAnswer.parentElement.textContent.trim() : '';
                            } else {
                                // Jika belum ada, tambahkan jawaban baru
                                const answerData = {
                                    questionId: questionId,
                                    answer: selectedAnswer ? selectedAnswer.value : '', // Jawaban kosong jika tidak ada yang dipilih
                                    answerDetail: selectedAnswer ? selectedAnswer.parentElement.textContent.trim() : '',
                                };
                                userAnswers.push(answerData);
                            }


                            sessionStorage.setItem('userAnswers', JSON.stringify(userAnswers));

                            updateRadioButtons();

                            if(timeIsUp){
                                submitAnswersWithoutConfirmation(courseId, materialId, type);
                            }


                            else{
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
                                                localStorage.removeItem('timer');
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
                            }

                        } else {
                            alert('Pilih jawaban terlebih dahulu.');
                        }
                }


                if (submitButton) {
                    submitButton.addEventListener('click', function(event) {
                        event.preventDefault();
                        submitAnswers();
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

                function submitAnswersWithoutConfirmation(courseId, materialId, type) {

                 // Lakukan pengumpulan jawaban tanpa konfirmasi
                    const submissionData = {
                        answers: userAnswers.map(answer => ({
                            questionId: answer.questionId,
                            answer: answer.answer,
                            answerDetail: answer.answerDetail,
                        })),
                        courseId: document.querySelector('input[name="courseId"]').value,
                        materialId: document.querySelector('input[name="materialId"]').value
                    }

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
                        };

    // Lakukan fetch API untuk melakukan permintaan POST
    // ...

    // Rest of your code


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
