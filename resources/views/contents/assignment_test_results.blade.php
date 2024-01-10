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
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <div class="px-5 bg-white sm:px-10">
            <div class="container flex flex-col items-start justify-between py-6 mx-auto md:flex-row md:items-center">
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
        <div class="container p-4 mx-auto my-4">
            <div class="my-4 no-wrap md:-mx-2 md:flex">

                {{-- QUESTION  --}}
                <div id="asg-top" class="my-4"></div>

                <div class="mx-4 bg-white w-2xl border-xl md:mx-12 md:w-9/12">
                    <div class="p-6 mx-auto antialiased">
                        @if ($material->minimum_score <= $materialCompleted->total_score)
                            {{-- Success --}}
                            <div class="space-y-4">
                                <h1
                                    class="relative block w-auto pt-4 mx-6 font-bold tracking-normal text-gray-800 text-md lg:text-xl">
                                    Nilai : <span class="text-green-600">{{ $materialCompleted->total_score }}</span>
                                </h1>
                                @if ($material->materialContentToMasterType->master_type_name == 'Assignment')
                                    <h2
                                        class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                        Selamat, anda berhasil mengerjakan assignment ini! Silahkan melanjutkan ke sesi
                                        berikutnya.
                                    </h2>
                                @else
                                    <h2
                                        class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                        Selamat, anda berhasil menyelesaikan Final Test ini!
                                    </h2>
                                @endif
                            </div>
                            {{-- Success --}}
                        @else
                            {{-- Fail --}}
                            <div class="space-y-4">
                                <h1
                                    class="relative block w-auto pt-4 mx-6 font-bold tracking-normal text-gray-800 text-md lg:text-xl">
                                    Nilai : <span class="text-red-600">{{ $materialCompleted->total_score }}</span>
                                </h1>

                                @if ($remainingTime > 0 && $material->materialContentToMasterType->master_type_name == 'Assignment')
                                    <h2
                                        class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                        Maaf, anda belum lulus mengerjakan Assignment ini. Silahkan mencoba kembali setelah
                                        30 menit.
                                    </h2>
                                    <h2
                                        class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                        {{ $remainingTime }} Menit Hingga Uji Coba Ulang Berikutnya</h2>
                                    <a href="#" onclick="refreshPage()" id="refreshButton"
                                        class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-red-600 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">
                                        <span class="items-center mx-2"> Refresh Halaman </span>
                                    </a>
                                @elseif ($remainingTime > 0 && $material->materialContentToMasterType->master_type_name == 'Final Test')
                                    <h2
                                        class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                        Maaf, anda belum lulus mengerjakan Final Test ini. Silahkan mencoba kembali pada
                                        esok hari.
                                    </h2>
                                    <h2 class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md"
                                        id="remainingTime">
                                        {{ $remainingTime }} Menit Hingga Uji Coba Ulang Berikutnya
                                    </h2>
                                    <strong class="flex items-center justify-center">Batas untuk mengambil ulang Assignment
                                        ini adalah 3 Kali. Anda memiliki {{ 3 - $materialCompleted->attempts }} kesempatan
                                        lagi.</strong>
                                    <strong class="flex items-center justify-center">Apabila gagal, anda harus menunggu 30
                                        menit sebelum dapat mengerjakan assignment kembali.</strong>
                                    <a href="#" onclick="refreshPage()" id="refreshButton"
                                        class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-red-600 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">
                                        <span class="items-center mx-2"> Refresh Halaman </span>
                                    </a>
                                @elseif (
                                    $materialCompleted->blocked_until == null &&
                                        $material->materialContentToMasterType->master_type_name == 'Final Test' &&
                                        $remainingTime == 0)
                                    <h2
                                        class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                        Maaf, anda belum berhasil menyelesaikan final test ini. Silahkan mencoba lagi.
                                    </h2>
                                    <strong class="flex items-center justify-center">Batas untuk mengambil ulang Final Test
                                        ini adalah 1 Kali.</strong>
                                    <strong class="flex items-center justify-center">Apabila gagal, anda harus menunggu 1
                                        hari sebelum dapat mengerjakan Final Test kembali.</strong>
                                    <a href='/courses/material/{{ $sidebars->title }}/{{ $course->id }}/{{ $material_id }}/{{ $firstRandomQuestion->id }}/{{ $type }}/1'
                                        class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                        <span class="items-center mx-2">Mengambil Ulang Final Test
                                        </span>
                                    </a>
                                @elseif (
                                    $materialCompleted->blocked_until == null &&
                                        $material->materialContentToMasterType->master_type_name == 'Assignment' &&
                                        $remainingTime == 0)
                                    <h2
                                        class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                        Maaf, anda belum berhasil menyelesaikan assignment ini. Silahkan mencoba lagi.
                                    </h2>
                                    <strong class="flex items-center justify-center">Batas untuk mengambil ulang Assignment
                                        ini adalah 3 Kali. Anda memiliki {{ 3 - $materialCompleted->attempts }} kesempatan
                                        lagi.</strong>
                                    <strong class="flex items-center justify-center">Apabila gagal, anda harus menunggu 30
                                        menit sebelum dapat mengerjakan assignment kembali.</strong>
                                    <a href='/courses/material/{{ $sidebars->title }}/{{ $course->id }}/{{ $material_id }}/{{ $firstRandomQuestion->id }}/{{ $type }}/1'
                                        class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">
                                        <span class="items-center mx-2">Mengambil Ulang Assignment
                                        </span>
                                    </a>
                                @elseif (
                                    $materialCompleted->blocked_until &&
                                        now() < $materialCompleted->blocked_until &&
                                        $material->materialContentToMasterType->master_type_name == 'Assignment')
                                    <h2
                                        class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                        Maaf, anda belum lulus mengerjakan Assignment ini. Silahkan mencoba kembali setelah
                                        30 menit
                                    </h2>
                                    <h2
                                        class="relative w-auto py-4 mx-6 mb-2 font-semibold tracking-normal text-gray-800 text-md lg:text-md">
                                        {{ $remainingTime }} Menit Hingga Uji Coba Ulang Berikutnya</h2>
                             
                                @endif

                            </div>
                            {{-- Fail --}}


                        @endif


                    </div>
                    <hr>
                    {{-- QUESTION TEXT --}}
                    <div class="p-6 mx-auto antialiased">
                        <div class="space-y-4">
                            @forelse ($userAnswers as $index => $userAnswer)
                                <h1
                                    class="pt-{{ $index + 1 }} text-md relative mx-6 mb-6 block w-auto font-semibold tracking-normal text-gray-800 lg:text-xl">
                                    {{ $index + 1 }}. {{ $userAnswer->question->questions }}
                                </h1>
                                @if ($userAnswer->question->question_img != null && $type == 'assignment')
                                    <img src={{ asset('uploads/asg_question_img/' . $userAnswer->question->question_img) }}
                                        alt="course image" class="object-cover w-full h-full" />
                                @elseif ($userAnswer->question->question_img != null && $type == 'finalTest')
                                    <img src={{ asset('uploads/final_question_img/' . $userAnswer->question->question_img) }}
                                        alt="course image" class="object-cover w-full h-full" />
                                @endif
                                <div class="pl-12">
                                    @foreach (['jawaban_a', 'jawaban_b', 'jawaban_c', 'jawaban_d'] as $choice)
                                        <div class="flex items-center mb-4 mr-4">
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
                                                    class="flex items-center text-green-400 underline cursor-pointer text-md">
                                                    <span
                                                        class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                                    {{ $userAnswer->question->$choice }}</label>
                                            @else
                                                <input id="radio{{ $index + 1 }}-{{ $choice }}" type="radio"
                                                    name="radio{{ $index + 1 }}" class="hidden" />
                                                <label for="radio{{ $index + 1 }}-{{ $choice }}"
                                                    class="flex items-center cursor-pointer text-md">
                                                    <span
                                                        class="inline-block w-4 h-4 mr-2 border border-gray-600 rounded-full flex-no-shrink"></span>
                                                    {{ $userAnswer->question->$choice }}
                                                </label>
                                            @endif


                                            @if ($userAnswer->is_correct == true && $userAnswer->question->$choice == $userAnswer->answer_detail)
                                                {{-- Correct answer --}}
                                                <h1
                                                    class="relative block w-auto mx-6 font-semibold tracking-normal text-green-400 text-md lg:text-xl">
                                                    ✓
                                                </h1>
                                            @elseif($userAnswer->is_correct == false && $userAnswer->question->$choice == $userAnswer->answer_detail)
                                                {{-- Incorrect answer --}}
                                                <h1
                                                    class="relative block w-auto mx-6 font-semibold tracking-normal text-red-400 text-md lg:text-xl">
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
                        <div class="p-6 mx-auto antialiased">
                            <div class="space-y-4">
                                <a href='/courses/material/{{ $material->title }}/{{ $course->id }}/{{ $material->id }}'
                                    class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">


                                    <span class="items-center mx-2">Keluar
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endif
                    @if ($material->materialContentToMasterType->master_type_name == 'Final Test')
                        <div class="p-6 mx-auto antialiased">
                            <div class="space-y-4">
                                <a href='/courses/material/{{ $material->title }}/{{ $course->id }}/{{ $material->id }}'
                                    class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">


                                    <span class="items-center mx-2">Keluar
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
<script>
    function refreshPage() {
        location.reload();
    }
</script>

</html>
