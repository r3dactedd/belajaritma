<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Courses</title>
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
                    <p class="flex items-center text-xs text-teal-400">
                        <span>Home</span>
                        <span class="mx-2">&gt;</span>
                        <span>Courses</span>
                    </p>
                    <h4 class="text-2xl font-bold leading-tight text-gray-800">
                        Courses
                    </h4>
                </div>
                <div class="mt-6 md:mt-0">
                    <button
                        class="flex items-center rounded bg-teal-400 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20"
                            height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        <div class="mx-2"> Tambah Kursus </div>
                    </button>
                </div>
            </div>
        </div>

        <div class="container mx-auto my-12 grid w-11/12 gap-8 pb-12 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($data as $data)
              <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                <img class="w-full" src="https://tuk-cdn.s3.amazonaws.com/assets/templates/Education-Portal/ep_10.png" alt="banner">
                <div class="px-6 py-4">
                    <h3 class="font-bold text-xl mb-2">{{$data->course_name}}</h3>
                  <p class="text-dark-700 text-base">
                    {{$data->course_desc}}
                  </p>
                </div>
                {{-- JUMLAH MODULE --}}
                <h4 class="text-md mb-6 px-5 font-semibold leading-5 tracking-normal">
                    {{$data->total_module}} Modul
                </h4>
                {{-- USE KALAU USER ONGOING COURSE --}}
                <h4 class="text-md mb-6 px-5 font-semibold leading-5 tracking-normal text-yellow-400">
                    Sedang Mengerjakan
                </h4>
                {{-- PROG BAR --}}
                <div class="bg-grey-light mb-6 w-full px-5">
                    <div class="rounded-xl bg-blue-400 py-1 text-center text-xs leading-none text-white"
                        style="width: 45%">45%
                    </div>
                </div>
                <form action="/courses/{{$data->id}}" method="get">
                    <button
                        class="flex items-center rounded bg-blue-400 mb-6 ml-5 px-2 py-2 text-sm text-white transition duration-150 ease-in-out hover:bg-yellow-500 focus:outline-none" action="/courses/{{$data->id}}" method="get">
                        <div class="mx-2"> Go To Course</div>
                    </button>
                </form>
              </div>
              @endforeach
              <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
                <a href="/courses/1/getcerti"
                    class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Unduh
                    Sertifikat</a>
            </p>
        </div>

        <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
            <a href="/courses/1/getcerti"
                class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Unduh
                Sertifikat</a>
        </p>
        <p class="text-lg font-bold leading-5 tracking-normal text-teal-400">
            <a href="/forum"
                class="bg-selected inline-block rounded-3xl bg-teal-400 px-4 py-2 text-sm font-semibold text-gray-800 hover:bg-green-400">Forum</a>
        </p>
    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection
</body>


</html>
