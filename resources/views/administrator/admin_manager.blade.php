<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="./style.css" rel="stylesheet" />
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let modal = document.getElementById("my-modal");
            let btn = document.getElementById("open-btn");
            let button = document.getElementById("ok-btn");

            btn.onclick = function() {
                modal.style.display = "block";
            }

            button.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
</head>

<body class="bg-gray-200 pb-12">
    @section('title', 'Homepage')
    @extends('layout.layout')
    @section('header')
        @include('layout.header')
    @endsection
    @section('content')

        <!-- page heading -->
        <div class="bg-white px-5 sm:px-10">
            <div class="container mx-auto flex flex-col items-start justify-between py-6 md:flex-row md:items-center">
                <div>
                    <h4 class="inline text-2xl font-bold leading-tight text-gray-800">
                        <a  class="flex items-center" href="#">
                            
                            <span class="mb-1 ml-2">Admin Manager</span>
                        </a>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-12 grid w-11/12 gap-8 pb-12 sm:grid-cols-1 md:grid-cols-3">
            <div>
                <a href="/manager/course">
                    <div
                        class="cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="relative h-56 w-full">
                            <img class="absolute inset-0 z-0 h-full w-full rounded-t object-cover"
                            src="{{ asset('local/course.jpg') }}"
                                alt="banner" />
                        </div>
                        <div class="h-full w-full pt-5 md:h-36">
                            <h4 class="mb-4 px-5 text-xl font-bold leading-5 tracking-normal text-gray-800 lg:text-2xl">
                                Manage Kursus
                            </h4>
                            <p class="mb-6 px-5 text-base font-normal tracking-normal text-gray-600">
                                Melakukan pengaturan untuk detail kursus, materi kursus, dan tes akhir kursus.
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div>
                <a href="/manager/certification">
                    <div
                        class="cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="relative h-56 w-full">
                            <img class="absolute inset-0 z-0 h-full w-full rounded-t object-cover"
                            src="{{ asset('local/certification.png') }}"
                                alt="banner" />
                        </div>
                        <div class="h-full w-full pt-5 md:h-36">

                            <h4 class="mb-4 px-5 text-xl font-bold leading-5 tracking-normal text-gray-800 lg:text-2xl">
                                Manage Sertifikasi
                            </h4>
                            <p class="mb-6 px-5 text-base font-normal tracking-normal text-gray-600">
                                Melakukan pengaturan untuk detail dan tes sertifikasi.
                            </p>

                        </div>
                    </div>
                </a>
            </div>
            <div>
                <a href="/manager/transaction">
                    <div
                        class="cursor-pointer rounded-xl border border-gray-200 bg-white shadow transition duration-150 ease-in-out hover:shadow-lg">
                        <div class="relative h-56 w-full">
                            <img class="absolute inset-0 z-0 h-full w-full rounded-t object-cover"
                            src="{{ asset('local/verification.jpg') }}"
                                alt="banner" />
                        </div>
                        <div class="h-full w-full pt-5 md:h-36">
                            <h4 class="mb-4 px-5 text-xl font-bold leading-5 tracking-normal text-gray-800 lg:text-2xl">
                                Verifikasi Pembayaran Sertifikasi
                            </h4>
                            <p class="mb-6 px-5 text-base font-normal tracking-normal text-gray-600">
                                Melakukan verifikasi untuk transaksi pembayaran sertifikasi.
                            </p>

                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection
</body>

</html>
