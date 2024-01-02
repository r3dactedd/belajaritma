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
                </div>
                {{-- QUESTION  --}}
                <div id="asg-top" class="my-4"></div>
                <div class="w-2xl mx-4 rounded-xl bg-white md:mx-12 md:w-8/12">
                    {{-- QUESTION TEXT --}}
                    <div class="mx-auto p-6 antialiased">
                        <div class="space-y-4">
                            <h1
                                class="relative mx-6 mb-6 block w-auto pt-6 text-base font-semibold tracking-normal text-gray-800 lg:text-xl">
                                1. {{ $questionDetail->questions }}
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

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio1-a" type="radio" name="radio1" class="hidden" />
                                    <label for="radio1-a" value="A" class="flex cursor-pointer items-center text-base">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        {{ $questionDetail->jawaban_a }}</label>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio1-b" value="B" type="radio" name="radio1" class="hidden" />
                                    <label for="radio1-b" class="flex cursor-pointer items-center text-base">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        {{ $questionDetail->jawaban_b }}</label>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio1-c" value="C" type="radio" name="radio1" class="hidden" />
                                    <label for="radio1-c" class="flex cursor-pointer items-center text-base">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        {{ $questionDetail->jawaban_c }}</label>
                                </div>

                                <div class="mb-4 mr-4 flex items-center">
                                    <input id="radio1-d" value="D" type="radio" name="radio1" class="hidden" />
                                    <label for="radio1-d" class="flex cursor-pointer items-center text-base">
                                        <span
                                            class="flex-no-shrink mr-2 inline-block h-4 w-4 rounded-full border border-gray-600"></span>
                                        {{ $questionDetail->jawaban_d }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="mx-auto p-6 antialiased">
                        <div class="grid grid-cols-2">
                            @if ($question_id > $firstQuestion->id)
                                <a href="/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $question_id - 1 }}/{{ $type }}"
                                    class="y-4 mx-auto mr-4 mt-4 hidden items-center rounded-md bg-indigo-500 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:flex">
                                    <svg class="mr-2 h-4 w-4"xmlns="http://www.w3.org/2000/svg" height="1em"
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
                                    class="y-4 mx-auto ml-4 mt-4 hidden items-center rounded-md bg-red-500 px-4 py-3 text-sm font-semibold text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none md:flex">

                                    <span class="mx-2">Submit
                                    </span>
                                </a>
                            @endif
                            @if ($question_id < $latestQuestion->id)
                                <a href="/courses/material/{{ $title }}/{{ $id }}/{{ $material_id }}/{{ $question_id + 1 }}/{{ $type }}"
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
    </body>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
