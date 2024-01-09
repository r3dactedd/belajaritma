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

<body class="bg-gray-200 pb-12">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <div class="bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>

                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a onclick="history.back()" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Sesi {{ $sidebars->order }} : {{ $sidebars->title }}</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-4 p-4">
            <div class="no-wrap my-4 md:-mx-2 md:flex">

                {{-- QUESTION  --}}
                <div id="asg-top" class="my-4"></div>

                <div class="w-2xl border-xl mx-4 bg-white md:mx-12 md:w-9/12">
                    <div class="mx-auto p-6 antialiased">
                        @if ($material->minimum_score <= $materialCompleted->total_score)
                            {{-- Success --}}
                            <div class="space-y-4">
                                <h1
                                    class="text-md relative mx-6 block w-auto pt-4 font-bold tracking-normal text-gray-800 lg:text-xl">
                                    Nilai : <span class="text-green-600">{{ $materialCompleted->total_score }}</span>
                                </h1>
                                @if ($material->materialContentToMasterType->master_type_name == 'Assignment')
                                    <h2
                                        class="text-md lg:text-md relative mx-6 mb-2 w-auto py-4 font-semibold tracking-normal text-gray-800">
                                        Selamat, anda berhasil mengerjakan assignment ini! Silahkan melanjutkan ke sesi
                                        berikutnya.
                                    </h2>
                                @else
                                    <h2
                                        class="text-md lg:text-md relative mx-6 mb-2 w-auto py-4 font-semibold tracking-normal text-gray-800">
                                        Selamat, anda berhasil menyelesaikan Final Test ini!
                                    </h2>
                                @endif
                            </div>
                            {{-- Success --}}
                        @else
                            {{-- Fail --}}
                            <div class="space-y-4">
                                <h1
                                    class="text-md relative mx-6 block w-auto pt-4 font-bold tracking-normal text-gray-800 lg:text-xl">
                                    Nilai : <span class="text-red-600">{{ $materialCompleted->total_score }}</span>
                                </h1>

                                @if (
                                    $materialCompleted->attempts < 3 &&
                                        $material->materialContentToMasterType->master_type_name == 'Assignment' &&
                                        now() > $materialCompleted->blocked_until)
                                    <h2
                                        class="text-md lg:text-md relative mx-6 mb-2 w-auto py-4 font-semibold tracking-normal text-gray-800">
                                        Maaf, anda belum berhasil menyelesaikan assignment ini. Silahkan mencoba kembali.
                                    </h2>
                                    <strong class="flex items-center justify-center">Batas untuk mengambil ulang Assignment
                                        ini adalah 3 Kali. Anda memiliki {{ 3 - $materialCompleted->attempts }} kesempatan
                                        lagi.</strong>
                                    <strong class="flex items-center justify-center">Apabila gagal, anda harus menunggu 30
                                        menit sebelum dapat mengerjakan assignment kembali.</strong>
                                    <a href='/courses/material/{{ $sidebars->title }}/{{ $course->id }}/{{ $material_id }}/{{ $firstIndex->id }}/{{ $type }}'
                                        class="y-4 mx-auto mt-4 flex w-full items-center justify-center rounded-md bg-indigo-500 px-2 py-4 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:w-4/12">
                                        <span class="mx-2 items-center">Ambil Ulang Assignment
                                        </span>
                                    </a>
                                @elseif (
                                    $materialCompleted->attempts < 1 &&
                                        $material->materialContentToMasterType->master_type_name == 'Final Test' &&
                                        now() > $materialCompleted->blocked_until)
                                    <strong class="flex items-center justify-center">Batas untuk mengambil ulang Final Test
                                        ini adalah 1 Kali. Anda memiliki {{ 1 - $materialCompleted->attempts }} kesempatan
                                        lagi.</strong>
                                    <strong class="flex items-center justify-center">Apabila gagal, anda harus menunggu 1
                                        hari sebelum dapat mengerjakan Final Test kembali.</strong>
                                    <a href='/courses/material/{{ $sidebars->title }}/{{ $course->id }}/{{ $material_id }}/{{ $firstIndex->id }}/{{ $type }}'
                                        class="y-4 mx-auto mt-4 flex w-full items-center justify-center rounded-md bg-indigo-500 px-2 py-4 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                        <span class="mx-2 items-center">Mengambil Ulang Final Test
                                        </span>
                                    </a>
                                @elseif (
                                    $materialCompleted->blocked_until &&
                                        now() < $materialCompleted->blocked_until &&
                                        $material->materialContentToMasterType->master_type_name == 'Final Test')
                                    <h2
                                        class="text-md lg:text-md relative mx-6 mb-2 w-auto py-4 font-semibold tracking-normal text-gray-800">
                                        Maaf, anda belum lulus mengerjakan Final Test ini. Silahkan mencoba kembali pada
                                        esok hari.
                                    </h2>
                                    <h2
                                        class="text-md lg:text-md relative mx-6 mb-2 w-auto py-4 font-semibold tracking-normal text-gray-800">
                                        {{ $remainingTime }} Menit Hingga Uji Coba Ulang Berikutnya</h2>
                                @elseif (
                                    $materialCompleted->blocked_until &&
                                        now() < $materialCompleted->blocked_until &&
                                        $material->materialContentToMasterType->master_type_name == 'Assignment')
                                    <h2
                                        class="text-md lg:text-md relative mx-6 mb-2 w-auto py-4 font-semibold tracking-normal text-gray-800">
                                        Maaf, anda belum lulus mengerjakan Assignment ini. Silahkan mencoba kembali setelah
                                        30 menit
                                    </h2>
                                    <h2
                                        class="text-md lg:text-md relative mx-6 mb-2 w-auto py-4 font-semibold tracking-normal text-gray-800">
                                        {{ $remainingTime }} Menit Hingga Uji Coba Ulang Berikutnya</h2>
                                @endif
                            </div>
                            {{-- Fail --}}
                        @endif


                    </div>
                    <hr>
                    {{-- QUESTION TEXT --}}
                    <div class="mx-auto p-6 antialiased">
                        <div class="space-y-4">
                            @forelse ($userAnswers as $index => $userAnswer)
                                <h1
                                    class="pt-{{ $index + 1 }} text-md relative mx-6 mb-6 block w-auto font-semibold tracking-normal text-gray-800 lg:text-xl">
                                    {{ $index + 1 }}. {{ $userAnswer->question->questions }}
                                </h1>
                                @if ($userAnswer->question->question_img != null && $type == 'assignment')
                                    <img src={{ asset('uploads/asg_question_img/' . $userAnswer->question->question_img) }}
                                        alt="course image" class="h-full w-full object-cover" />
                                @elseif ($userAnswer->question->question_img != null && $type == 'finalTest')
                                    <img src={{ asset('uploads/final_question_img/' . $userAnswer->question->question_img) }}
                                        alt="course image" class="h-full w-full object-cover" />
                                @endif
                                <div class="pl-12">
                                    @foreach (['jawaban_a', 'jawaban_b', 'jawaban_c', 'jawaban_d'] as $choice)
                                        <div class="mb-4 mr-4 flex items-center">
                                            @if (
                                                ($userAnswer->question->$choice == $userAnswer->question->jawaban_a &&
                                                    $userAnswer->question->jawaban_benar == 'A') ||
                                                    ($userAnswer->question->$choice == $userAnswer->question->jawaban_b &&
                                                        $userAnswer->question->jawaban_benar == 'B') ||
                                                    ($userAnswer->question->$choice == $userAnswer->question->jawaban_c &&
                                                        $userAnswer->question->jawaban_benar == 'C') ||
                                                    ($userAnswer->question->$choice == $userAnswer->question->jawaban_d &&
                                                        $userAnswer->question->jawaban_benar == 'D'))
                                                <input id="radio{{ $index + 1 }}-{{ $choice }}" type="radio"
                                                    name="radio{{ $index + 1 }}" class="hidden" />
                                                <label for="radio{{ $index + 1 }}-{{ $choice }}"
                                                    class="text-md flex cursor-pointer items-center text-green-400 underline">
                                                    <span
                                                        class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                                    {{ $userAnswer->question->$choice }}</label>
                                            @else
                                                <input id="radio{{ $index + 1 }}-{{ $choice }}" type="radio"
                                                    name="radio{{ $index + 1 }}" class="hidden" />
                                                <label for="radio{{ $index + 1 }}-{{ $choice }}"
                                                    class="text-md flex cursor-pointer items-center">
                                                    <span
                                                        class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                                    {{ $userAnswer->question->$choice }}
                                                </label>
                                            @endif


                                            @if ($userAnswer->is_correct == true && $userAnswer->question->$choice == $userAnswer->answer_detail)
                                                {{-- Correct answer --}}
                                                <h1
                                                    class="text-md relative mx-6 block w-auto font-semibold tracking-normal text-green-400 lg:text-xl">
                                                    ✓
                                                </h1>
                                            @elseif($userAnswer->is_correct == false && $userAnswer->question->$choice == $userAnswer->answer_detail)
                                                {{-- Incorrect answer --}}
                                                <h1
                                                    class="text-md relative mx-6 block w-auto font-semibold tracking-normal text-red-400 lg:text-xl">
                                                    ✗
                                                </h1>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @empty
                                <p>No user answers available.</p>
                            @endforelse
                        </div>
                    </div>


                    <hr>
                    @if ($material->materialContentToMasterType->master_type_name == 'Assignment')
                        <div class="mx-auto p-6 antialiased">
                            <div class="space-y-4">
                                <a href='/courses/material/{{ $material->title }}/{{ $course->id }}/{{ $material->id }}'
                                    class="y-4 mx-auto mt-4 flex w-full items-center justify-center rounded-md bg-indigo-500 px-2 py-4 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                    <span class="mx-2 items-center">Finish Assignment
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endif
                    @if ($material->materialContentToMasterType->master_type_name == 'Final Test')
                        <div class="mx-auto p-6 antialiased">
                            <div class="space-y-4">
                                <a href='/courses/material/{{ $material->title }}/{{ $course->id }}/{{ $material->id }}'
                                    class="y-4 mx-auto mt-4 flex w-full items-center justify-center rounded-md bg-indigo-500 px-2 py-4 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                    <span class="mx-2 items-center">Finish Final Test
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
                <hr>
            </div>
        </div>

    </body>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
