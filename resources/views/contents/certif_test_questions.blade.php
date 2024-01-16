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
                            $shuffledQuestionIds = $listQuestionId;
                            session(['shuffledQuestionIds' => $shuffledQuestionIds, 'reshuffled' => false]);
                        }

                    @endphp
                    <!-- Sidebar, pass value courselistnya aja-->
                    <div class="p-2 bg-white border-4 border-green-400 rounded-xl md:flex md:flex-col">
                        <div class="flex flex-col overflow-hidden bg-white">
                            <div class="grid grid-cols-4 my-2">
                                @foreach ($shuffledQuestionIds as $index => $shuffledQuestionId)
                                    <a href="/certification/test/{{ $certif_id }}/{{ $shuffledQuestionId }}/2"
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
                            <p id="timer-display" timer-duration="{{ $certifDuration }}"
                                class="ml-2 text-base font-bold tracking-normal text-center text-gray-600">
                                5:00
                                <!-- Ubah nilai awal sesuai dengan material_duration -->
                            </p>
                        </div>
                    </div>
                    <div class="w-full my-2 flex justify-center text-center rounded-md shadow h-fit md:w-9/12">


                        <a id="exit-final" data-modal-target="popup-exit-cert" data-modal-toggle="popup-exit-cert"
                            class="w-full my-2 mr-2 justify-center items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800 shadow h-fit md:w-9/12">
                            Keluar dari Tes Sertifikasi
                        </a>
                        <div id="popup-exit-cert" tabindex="-1"
                            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0">
                            <div class="relative max-h-full w-full max-w-md">
                                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="popup-exit-cert">
                                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg class="mx-auto mb-4 h-12 w-12 text-gray-400 dark:text-gray-200"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                            Apakah kamu yakin ingin membatalkan pengerjaan tes sertifikasi?
                                        </h3>
                                        <strong>
                                            Attempt pengerjaan tes sertifikasi ini akan hangus
                                        </strong>
                                        <div class="flex justify-center text-center">
                                            <form method="GET" action="/certification/{{ $certif_id }}/exitCertTest">
                                                @csrf
                                                <button type="submit" id="exit-certi"
                                                    class="mr-2 items-center rounded-lg bg-red-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                                    Ya
                                                </button>
                                            </form>
                                            <button type="button"
                                                class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-indigo-400 hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200"
                                                data-modal-hide="popup-exit-final">
                                                Tidak
                                            </button>
                                        </div>
                                    </div>
                                </div>
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
                                {{ $currentQuestionNumber }}. {{ $questionDetail->questions }}
                            </h1>

                            @if ($questionDetail->question_img != null)
                                <img src={{ asset('uploads/certif_question_img/' . $questionDetail->question_img) }}
                                    alt="certif test image" class="object-cover w-full h-full" />
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
                                            <input class="mr-3" id="radio1-b" value="B" type="radio"
                                                name="radio1" data-question="{{ $question_id }}" />
                                            {{ $questionDetail->jawaban_b }}</label>
                                    </div>

                                    <div class="flex items-center mb-4 mr-4">

                                        <label for="radio1-c" class="flex items-center text-base cursor-pointer">
                                            <input class="mr-3" id="radio1-c" value="C" type="radio"
                                                name="radio1" data-question="{{ $question_id }}" />
                                            {{ $questionDetail->jawaban_c }}</label>
                                    </div>

                                    <div class="flex items-center mb-4 mr-4">

                                        <label for="radio1-d" class="flex items-center text-base cursor-pointer">
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


                    <div class="p-6 mx-auto antialiased">
                        <div class="grid grid-cols-2">
                            @if ($currentQuestionIndex > 0)
                                <a id="tombol-sebelumnya"
                                    href="/certification/test/{{ $certif_id }}/{{ $previousQuestionId }}/2"
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
                                <input type="hidden" name="certifId" value="{{ $id }}">
                                <button id="submit-button"
                                    class="hidden px-4 py-3 mx-auto mt-4 ml-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-red-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:flex">
                                    <span class="mx-2">Submit</span>
                                </button>
                            @endif
                            @if (!$isLastQuestion)
                                <a id="tombol-selanjutnya"
                                    href="/certification/test/{{ $certif_id }}/{{ $nextQuestionId }}/2"
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
                        <div class="question-container" data-question-id="{{ json_encode($listQuestionId) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- window.location.href = '/courses/material/' + $title + $id + $material_id + $type + '/results'; --}}
        <input type="hidden" id="id" name="id" value="{{ $certif_id }}">
        <input type="hidden" id="question_id" name="question_id" value="{{ $question_id }}">
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const nextButton = document.getElementById('tombol-selanjutnya');
                const previousButton = document.getElementById('tombol-sebelumnya');
                const exitAsg = document.getElementById('exit-certi');
                const submitButton = document.getElementById('submit-button');
                // localStorage.removeItem('userAnswers');
                let userAnswers = JSON.parse(localStorage.getItem('userAnswers')) || [];
                const questionContainer = document.querySelector('.question-container');
                // const startTime = Date.now();
                const rawQuestionIds = JSON.parse(document.querySelector('.question-container').getAttribute(
                    'data-question-id'));
                console.log(rawQuestionIds);

                // Sekarang, listQuestionId adalah array yang berisi question ID
                if (userAnswers.length === 0) {
                    rawQuestionIds.forEach(rawQuestionId => {
                        const questionId = String(rawQuestionId);
                        const existingAnswerIndex = userAnswers.findIndex(ans => ans.questionId === questionId);

                        const answerData = {
                            questionId: questionId,
                            answer: '', // Set the answer to the default value if needed
                            answerDetail: '', // Set the answerDetail to the default value if needed
                        };

                        userAnswers.push(answerData);
                    });
                }



                // Untuk keperluan debugging, Anda dapat mencetak array userAnswers ke konsol
                console.log(userAnswers);
                let timeIsUp = false;

                function convertTime(seconds) {
                    const minutes = Math.floor(seconds / 60);
                    const remainingSeconds = seconds % 60;
                    return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
                }

                let timerStarted = false;
                // localStorage.removeItem('certiTime');

                let timerInterval;

                function startTimer(duration, resetTimer) {
                    const timerDisplay = document.getElementById('timer-display');
                    const timerDuration = parseInt(timerDisplay.getAttribute('timer-duration'), 10) * 60;
                    let elapsedTime, remainingTime;

                    // Hapus 'certiTime' hanya jika belum pernah dihapus sebelumnya
                    const storedTime = sessionStorage.getItem('certiTime');

                    if (resetTimer && !timerStarted) {
                        sessionStorage.removeItem('certiTime');
                        timer = parseInt(storedTime, 10);
                    } else {
                        timerStarted = true;
                        timer = duration;
                    }

                    const getStartTime = function() {
                        const storedStartTime = sessionStorage.getItem('certiTime');
                        return (storedStartTime !== null) ? parseInt(storedStartTime, 10) : Date.now() / 1000;
                    };

                    let startTime = getStartTime();

                    const convertTime = function(seconds) {
                        const minutes = Math.floor(seconds / 60);
                        const remainingSeconds = Math.floor(seconds % 60); // Round down the seconds
                        return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
                    };

                    const updateTimerDisplay = function() {
                        timerDisplay.textContent = convertTime(remainingTime);

                        if (remainingTime > 0) {
                            remainingTime--;
                            sessionStorage.setItem('certiTime', startTime);
                        } else {
                            clearInterval(timerInterval);
                            submitAnswersWithoutConfirmation();
                            alert('Waktu telah habis. Jawaban Anda sudah otomatis terkumpul.');
                        }
                    };

                    // Hentikan interval sebelum membuat yang baru
                    clearInterval(timerInterval);

                    elapsedTime = Math.floor(Date.now() / 1000) - startTime;
                    remainingTime = Math.max(0, timerDuration - elapsedTime);

                    // Atur interval kembali
                    timerInterval = setInterval(updateTimerDisplay, 1000);
                    if (timerStarted) {
                        updateTimerDisplay();
                    }

                    // if(resetTimer){
                    //     timerStarted = false;
                    // }
                    // else{
                    //     timerStarted = true;
                    // }

                }
                const timerDisplay = document.getElementById('timer-display');
                const timerDuration = timerDisplay.getAttribute('timer-duration');
                const totalSeconds = parseInt(timerDuration) * 60 - 1;
                // Jalankan startTimer saat halaman dimuat
                startTimer(totalSeconds, false);
                // Jalankan startTimer saat halaman dimuat


                // startTimer(totalSeconds);

                function validateAnswers() {
                    // Lakukan validasi apakah semua soal telah terisi
                    // Anda dapat menggunakan data dari userAnswers untuk melakukan validasi
                    return userAnswers.every(answer => answer.answer !== undefined && answer.answer !== null && answer
                        .answer !== '');
                }

                if (nextButton) {
                    nextButton.addEventListener('click', function() {
                        const selectedAnswer = document.querySelector('input[name="radio1"]:checked');
                        const questionId = document.getElementById('question_id').value;

                        if (questionId) {
                            // Cek apakah questionId sudah ada di dalam userAnswers
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
                            localStorage.setItem('userAnswers', JSON.stringify(userAnswers));

                            updateRadioButtons();
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
                            localStorage.setItem('userAnswers', JSON.stringify(userAnswers));

                            updateRadioButtons();
                            // Ganti isi pertanyaan dan jawaban di dalam HTML dengan data yang diterima dari server
                            // ...

                        } else {
                            alert('Pilih jawaban terlebih dahulu.');
                        }
                    });
                }


                if (exitAsg) {
                    exitAsg.addEventListener('click', function() {

                            sessionStorage.removeItem('certiTime');
                            const timerDisplay = document.getElementById('timer-display');
                            const timerDuration = timerDisplay.getAttribute('timer-duration');
                            const totalSeconds = parseInt(timerDuration) * 60 -
                                1; // Remove timer data from sessionStorage
                            timerStarted = false;
                            startTimer(totalSeconds, true);
                            const certifId = document.getElementById('id').value;
                            clearSelectedAnswers();

                    });
                }
                // startTimer();


                function submitAnswers() {
                    const selectedAnswer = document.querySelector('input[name="radio1"]:checked');
                    const questionId = document.getElementById('question_id').value;
                    var courseId = document.getElementById('id').value;


                    if (questionId) {

                        const existingAnswerIndex = userAnswers.findIndex(ans => ans.questionId === questionId);

                        if (existingAnswerIndex !== -1) {
                            // Jika sudah ada, update jawabannya
                            userAnswers[existingAnswerIndex].answer = selectedAnswer ? selectedAnswer.value : '';
                            userAnswers[existingAnswerIndex].answerDetail = selectedAnswer ? selectedAnswer
                                .parentElement.textContent.trim() : '';
                        } else {
                            // Jika belum ada, tambahkan jawaban baru
                            const answerData = {
                                questionId: questionId,
                                answer: selectedAnswer.value, // Jawaban kosong jika tidak ada yang dipilih
                                answerDetail: selectedAnswer.parentElement.textContent.trim()
                            };
                            userAnswers.push(answerData);
                        }


                        localStorage.setItem('userAnswers', JSON.stringify(userAnswers));

                        updateRadioButtons();

                        if (timeIsUp) {
                            submitAnswersWithoutConfirmation(courseId, materialId, type);
                        } else {
                            const isConfirmed = window.confirm('Apakah Anda yakin ingin mengumpulkan jawaban?');
                            if (isConfirmed) {
                                sessionStorage.removeItem('timerCerti');
                                if (validateAnswers()) {
                                    const certifId = document.getElementById('id').value;
                                    // If validation is successful, send the submission data to the controller
                                    const submissionData = {
                                        answers: userAnswers.map(answer => ({
                                            questionId: answer.questionId,
                                            answer: answer.answer,
                                            answerDetail: answer.answerDetail,
                                        })),
                                        certifId: certifId
                                    };

                                    console.log(submissionData);

                                    // Use fetch API to make a POST request
                                    fetch('/certification/submit-answers', {
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
                                                clearSelectedAnswers();
                                                const timerDisplay = document.getElementById('timer-display');
                                                const timerDuration = timerDisplay.getAttribute('timer-duration');
                                                const totalSeconds = parseInt(timerDuration) * 60 -
                                                    1; // Remove timer data from sessionStorage
                                                timerStarted = false;
                                                startTimer(totalSeconds, true);
                                                window.location.href = '/certification/' + certifId +
                                                    '/score'
                                            } else {}
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

                        if (userAnswer.answer == radioButton.value) {
                            // Set status checked if the answer exists
                            radioButton.checked = true;
                        } else {
                            // If the answer does not exist, ensure the radio button is unchecked
                            radioButton.checked = false;
                        }
                    });
                }

                function submitAnswersWithoutConfirmation(courseId, materialId, type) {
                    const certifId = document.getElementById('id').value;
                    // Lakukan pengumpulan jawaban tanpa konfirmasi
                    const submissionData = {
                        answers: userAnswers.map(answer => ({
                            questionId: answer.questionId,
                            answer: answer.answer,
                            answerDetail: answer.answerDetail,
                        })),
                        certifId: certifId
                    }

                    fetch('/certification/submit-answers', {
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
                                const timerDisplay = document.getElementById('timer-display');
                                const timerDuration = timerDisplay.getAttribute('timer-duration');
                                const totalSeconds = parseInt(timerDuration) * 60 -
                                    1; // Remove timer data from sessionStorage
                                timerStarted = false;
                                startTimer(totalSeconds, true);
                                clearSelectedAnswers();
                                // Redirect ke halaman assignment_test_results
                                window.location.href = '/certification/' + certifId +
                                    '/score'
                            } else {
                                // Tangani respons HTML jika permintaan bukan dari AJAX
                                // Lakukan sesuatu dengan HTML yang diterima
                            }

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
                    localStorage.removeItem('userAnswers');
                }
            });
        </script>
    </body>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
