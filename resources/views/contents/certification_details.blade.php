<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-200 pb-12">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')
        <div class="scroll-smooth bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>
                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a href="/certifications" class="flex items-center" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
                            </svg>
                            <span class="mb-1 ml-2">Detail Sertifikasi</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-auto p-6 md:w-8/12">

            <div class="my-4 rounded-xl bg-white md:flex">
                <!-- Left Side -->
                <div class="w-full md:w-1/3">

                    <div class="h-full p-2 md:py-4 md:pl-8">
                        <div class="mx-auto h-full w-full">
                            <img class="max-h-64 w-full p-4 md:px-0"
                                src= "{{ asset('uploads/certif_images/' . $data->certif_img) }}"
                                alt="Certification Image" />
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="h-auto w-full md:mx-2 md:w-2/3">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="rounded-xl bg-white px-6 py-2 md:px-12">
                        <h1
                            class="py-2 text-center text-xl font-bold tracking-normal text-gray-800 md:py-6 md:pr-4 md:text-left lg:text-3xl">
                            {{ $data->certif_title }}
                        </h1>
                        <p class="mb-6 text-base font-normal tracking-normal text-gray-600">
                            {{ $data->certif_short_desc }}
                        </p>
                        <div class="grid-row-2 grid md:grid-cols-2">
                            <div class="flex flex-row items-center justify-between lg:flex-col lg:items-start">
                                <div
                                    class="mb-3 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M353.8 54.1L330.2 6.3c-3.9-8.3-16.1-8.6-20.4 0L286.2 54.1l-52.3 7.5c-9.3 1.4-13.3 12.9-6.4 19.8l38 37-9 52.1c-1.4 9.3 8.2 16.5 16.8 12.2l46.9-24.8 46.6 24.4c8.6 4.3 18.3-2.9 16.8-12.2l-9-52.1 38-36.6c6.8-6.8 2.9-18.3-6.4-19.8l-52.3-7.5zM256 256c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H384c17.7 0 32-14.3 32-32V288c0-17.7-14.3-32-32-32H256zM32 320c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H160c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32H32zm416 96v64c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V416c0-17.7-14.3-32-32-32H480c-17.7 0-32 14.3-32 32z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">Sertifikasi</span>
                                </div>

                                <div
                                    class="mb-3 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 640 512">
                                        <path
                                            d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
                                    </svg>
                                    <span class="p-2 text-base font-semibold text-gray-600">
                                        {{ $data->students_registered }}
                                        Siswa</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4"></div>
            <div class="mx-auto my-auto md:-mx-2 md:flex">
                <div class="h-auto w-full md:mx-2">
                    <div class="rounded-t-xl bg-white p-4 shadow-sm">
                        <div class="mb-3 ml-2 flex items-center space-x-2 font-semibold leading-8 text-gray-900">

                            <span class="px-2 text-xl tracking-wide">Mengenai Sertifikasi</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="flex text-sm">
                                <div class="block">
                                    <div class="px-4 py-2 font-semibold">
                                        <p> {{ $data->certif_desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-b-xl bg-white p-4 shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-2">
                            <div>
                                <div class="mb-3 ml-2 flex items-center space-x-2 font-semibold leading-8 text-gray-900">

                                    <span class="px-2 text-xl tracking-wide">Informasi Test</span>
                                </div>
                                <div class="grid grid-cols-1 gap-4 py-4 pl-4 pr-8 font-semibold md:grid-cols-3">
                                    <div class="rounded-lg bg-white p-4 shadow-md">
                                        <div class="text-indigo-500">Waktu Test</div>
                                        <div class="text-xs text-gray-500">{{ $data->certif_duration }} menit</div>
                                    </div>
                                    <div class="rounded-lg bg-white p-4 shadow-md">
                                        <div class="text-indigo-500">Jumlah Soal</div>
                                        <div class="text-xs text-gray-500">{{ $data->total_questions }} Pilihan Ganda</div>
                                    </div>
                                    <div class="rounded-lg bg-white p-4 shadow-md">
                                        <div class="text-indigo-500">Biaya Sertifikasi</div>
                                        <div class="text-xs text-gray-500">Rp.
                                            {{ number_format($data->certif_cost, 2, ',', '.') }}</div>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <div
                                    class="mb-3 ml-2 mt-6 flex items-center space-x-2 font-semibold leading-8 text-gray-900 md:mt-0">

                                    <span class="px-2 text-xl tracking-wide">Kompetensi Sertifikasi</span>
                                </div>
                                <div class="whitespace-pre-line px-4 text-sm font-semibold text-gray-700">
                                    <p>{{ $data->certif_outline }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="my-4"></div>
            @if (auth()->check())
                @if (auth()->user()->isRegistered($data->id))
                    @if (auth()->user()->hasPassedCerification($data->id))
                        <div
                            class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                            <div class="w-full px-4">
                                <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                                    <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                        Bukti Penyelesaian Sertifikasi
                                    </h2>
                                    <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                                        Selamat! Anda telah lulus tes sertifikasi ini. Silahkan mengunduh bukti sertifikasi
                                        anda.
                                    </p>
                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            <p onclick="downloadImage()"
                                                class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                                <a
                                                    class="bg-selected inline-block rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Unduh
                                                    Bukti Sertifikasi</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div
                            class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                            <div class="w-full px-4">
                                <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                                    <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                        Ambil Test Sertifikasi
                                    </h2>
                                    <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                                        Anda telah berhasil registrasi untuk sertifikasi ini. Silahkan memulai test ini.
                                    </p>

                                    <div class="flex items-center">
                                        <div class="flex items-center">
                                            @if ($register->attempts < 1)
                                                <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                                    <a href="/certifications/aboutTest/{{ $data->id }}"
                                                        id="convertButton"
                                                        class="bg-selected inline-block rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Ambil
                                                        Test</a>
                                                </p>
                                            @elseif ($register->attempts >= 1)
                                                <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                                    <a href="/certification/{{ $data->id }}/score" id="convertButton"
                                                        class="bg-selected inline-block rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Lihat
                                                        Nilai</a>
                                                </p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @elseif (!$transaction || ($transaction->is_pending == false && $transaction->isApproved == false))
                    {{-- Havent sent transaction OR transaction declined --}}

                    <div
                        class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                        <div class="w-full px-4">
                            <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                                <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                    Registrasi Sertifikasi
                                </h2>
                                <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                                    Anda belum melakukan registrasi untuk sertifikasi ini.
                                    Untuk mengakses tes sertifikasi, selesaikan pembayaran terlebih dahulu.
                                </p>

                                <div class="flex items-center">
                                    <div class="flex items-center">

                                        <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                            <a href="/transaction/{{ $data->id }}" id="convertButton"
                                                class="bg-selected inline-block rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Registrasi</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (!auth()->user()->isRegistered($data->id) && $transaction->is_pending == true)
                    {{-- Not register AND transaction pending --}}

                    <div
                        class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                        <div class="w-full px-4">
                            <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                                <div class="text-center">
                                    <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                        Pembayaran Anda sedang diproses. Harap tunggu konfirmasi dari admin melalui Email.
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <div class="container mx-auto mb-10 flex flex-col-reverse rounded-xl bg-white shadow md:w-3/5 lg:flex-row">
                    <div class="w-full px-4">
                        <div class="p-4 lg:pb-6 lg:pl-6 lg:pr-6 lg:pt-6">
                            <h2 class="mb-2 mt-4 text-xl font-bold tracking-normal text-gray-800 lg:text-2xl">
                                Registrasi Sertifikasi
                            </h2>
                            <p class="mb-6 text-sm font-normal tracking-normal text-gray-600">
                                Anda belum melakukan registrasi untuk sertifikasi ini.
                                Untuk mengakses tes sertifikasi, selesaikan pembayaran terlebih dahulu.
                            </p>

                            <div class="flex items-center">
                                <div class="flex items-center">

                                    <p class="text-lg font-bold leading-5 tracking-normal text-indigo-600">
                                        <a href="/transaction/{{ $data->id }}" id="convertButton"
                                            class="bg-selected inline-block rounded-xl bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400">Registrasi</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
    </body>
    <style>
        .cert {
            border: 15px solid #4f46e5;
            border-right: 15px solid #818cf8;
            border-left: 15px solid #818cf8;
            width: 5.83in;
            /* Set width to 8.27 inches for A4 size */
            height: 8.27in;
            /* Set height to 11.69 inches for A4 size */
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: #383737;
        }

        .crt_title {
            margin-top: 60px;
            font-size: 40px;
            font-style: bold;
            letter-spacing: 0.2px;
            color: #0060a9;
            margin: 4px;
        }

        .crt_logo img {
            width: 130px;
            height: auto;
            margin: auto;
            padding: 30px;
        }

        .colorGreen {
            color: #27ae60;
        }

        .crt_user {
            display: inline-block;
            width: 80%;
            padding: 5px 25px;
            margin-bottom: 0px;
            padding-bottom: 0px;
            font-size: 40px;
            border-bottom: 1px dashed #cecece;
        }

        .afterName {
            font-weight: 100;
            color: #383737;
        }

        .colorGrey {
            color: grey;
        }

        .certSign {
            width: 200px;
        }

        .marginBottom {
            margin-bottom: 80px;
        }

        @media (max-width: 700px) {
            .cert {
                width: 100%;
            }
        }
    </style>

    @if (Auth::check() && $parsedFinDate != null)
        <table id="certificateProof" class="cert hidden bg-white">
            <tr>
                <td align="center">
                    <h1 class="crt_title px-4">Proof of Certification
                        <h2 class="afterName my-6 font-semibold">Bukti Sertifikasi ini Diberikan Kepada</h2>
                        <h1 class="colorGreen crt_user">{{ auth()->user()->full_name }}</h1>
                        <h2 class="afterName mt-4">Untuk Penyelesaian Sertifikasi</h2>
                        <h2 class="my-6 font-bold"> {{ $data->certif_title }}</h2>
                        <h3 class="mb-12 mt-4">Pada Tanggal <span class="font-semibold">
                                {{ $parsedFinDate->format('Y-m-d') }}</span></h3>
                        <img class="mb-16 w-3/5" src="{{ asset('local/logo.png') }}" alt="logo">
                </td>
            </tr>
        </table>
    @endif
    <script>
        function downloadImage() {
            //var container = document.getElementById("image-wrap"); //specific element on page
            var container = document.getElementById("certificateProof");
            container.classList.remove("hidden") // full page
            html2canvas(container, {
                allowTaint: true,
                useCORS: true
            }).then(function(canvas) {

                var link = document.createElement("a");
                document.body.appendChild(link);
                link.download = "proof_certification.jpg";
                link.href = canvas.toDataURL();
                link.target = '_blank';
                link.click();
            });
            container.classList.add("hidden")
        }
    </script>

@endsection
@section('footer')
    @include('layout.footer')
@endsection

</html>
