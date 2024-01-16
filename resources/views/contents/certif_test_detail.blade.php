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
                        <a href="/certifications/{{ $data->id }}" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Certification Test</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container p-4 mx-auto my-4">
            <div class="my-4 no-wrap md:-mx-2 md:flex">

                {{-- QUESTION  --}}
                <div id="asg-top" class="my-4"></div>

                <div class="mx-4 bg-white w-2xl h-fit rounded-xl md:mx-12">
                    <div class="p-6 mx-auto antialiased">
                        <div class="space-y-4">
                            <h1
                                class="relative block w-auto py-4 mx-6 text-lg font-bold tracking-normal text-gray-800 lg:text-xl">
                                Mengenai Test
                            </h1>
                            <h2
                                class="relative w-auto mx-6 mb-2 text-base font-semibold tracking-normal text-gray-800 lg:text-base">
                                {{ $data->certif_desc }}
                            </h2>

                            <div class="grid w-full grid-cols-1 gap-4 pl-4 pr-8 font-semibold md:w-6/12 md:grid-cols-3">
                                <div class="p-4 bg-white rounded-lg">
                                    <div class="text-indigo-500">Waktu Pengerjaan</div>
                                    <div class="text-xs text-gray-500">{{ $data->certif_duration }} Menit</div>
                                </div>
                                <div class="p-4 bg-white rounded-lg">
                                    <div class="text-indigo-500">Nilai Minimum</div>
                                    <div class="text-xs text-gray-500">min. {{ $data->minimum_score }} </div>
                                </div>
                                <div class="px-2 py-4 bg-white rounded-lg">
                                    <div class="text-indigo-500">Status Pengerjaan</div>
                                    <div class="text-xs text-gray-500">
                                        @if ($getCertCompleted->total_score == null)
                                            <a class="font-bold">Belum Dikerjakan</a>
                                        @elseif ($getCertCompleted->total_score < $data->minimum_score)
                                            <a class="font-bold text-red-500">Belum Lulus</a>
                                        @elseif ($getCertCompleted->total_score >= $data->minimum_score)
                                            <a class="font-bold text-green-500">Lulus</a>
                                        @endif
                                    </div>
                                </div>


                            </div>
                            <h2
                            class="relative mx-6 mb-2 w-auto text-base font-bold tracking-normal text-red-500 lg:text-base">
                            Apabila gagal, anda harus menunggu 1 hari sebelum dapat mengerjakan kembali tes sertifikasi ini.
                        </h2>
                            @if ($getCertCompleted->total_score == null)
                                <a href='/certification/test/{{ $data->id }}/{{ $firstIndexCERT->id }}/1'
                                    class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                    <span class="items-center mx-2">Mulai Test
                                    </span>

                                </a>
                            @elseif ($getCertCompleted->total_score != null)
                                <a href='/certification/{{ $data->id }}/score'
                                    class="flex items-center justify-center w-full px-2 py-4 mx-auto mt-4 text-sm font-semibold text-white transition duration-150 ease-in-out bg-indigo-500 rounded-md y-4 hover:bg-yellow-500 focus:outline-none md:w-4/12">

                                    <span class="items-center mx-2">Lihat Hasil Tes Sertifikasi
                                    </span>

                                </a>
                            @endif
                        </div>


                    </div>
                </div>

    </body>
@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
