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
    {{-- Upload Function --}}
    <script>
        function previewImage() {
            const imageInput = document.getElementById('inputPicture');
            const profilePreview = document.getElementById('profile-preview');

            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    profilePreview.src = e.target.result;
                };

                reader.readAsDataURL(imageInput.files[0]);
            }
        }
    </script>
    @section('title', 'Edit Profile')
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
                            <span class="mb-1 ml-2">Pengaturan Profil</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-5 p-5">
            {{-- EDIT PROFILE --}}
            <div class="my-4 justify-center rounded-xl md:grid md:grid-cols-3 md:gap-6">
                <div class="col-span-1 w-full">
                    <div class="h-full rounded-xl p-2 md:py-4 md:pl-8">
                        <h1
                            class="py-2 text-center text-xl font-bold tracking-normal text-gray-800 md:pb-6 md:pr-4 md:text-left lg:text-3xl">
                            Ubah Data Profil
                        </h1>
                        <p class="mb-6 text-base font-normal tracking-normal text-gray-600">
                            Anda dapat mengubah informasi akun anda disini.
                        </p>
                    </div>
                </div>
                <div class="col-span-2 h-auto md:mx-2 md:w-10/12">
                    <div class="rounded-xl bg-white px-6 py-8 md:px-12">
                        @if (session('success'))
                            <div id="toast-default"
                                class="flex w-full items-center rounded-lg bg-white p-4 text-gray-500 shadow dark:bg-gray-800 dark:text-gray-400"
                                role="alert">
                                <div class="mr-8 ms-3 text-sm font-semibold text-indigo-400">Registrasi Akun Anda Berhasil.
                                </div>
                                <button type="button"
                                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                    data-dismiss-target="#toast-default" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                        <form method="post" action="/editProfile" enctype="multipart/form-data">
                            @csrf
                            <label for="profilePicture"
                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Gambar
                                Profil</label>
                            <div class="mb-2 w-full md:w-3/12">
                                <div class="h-fit w-auto">
                                    <img id="profile-preview" class="h-32 w-32 rounded-full object-cover"
                                        src={{ asset('uploads/profile_images/' . Auth::user()->profile_img) }}>
                                </div>
                            </div>
                            <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                <div class="max-w-md">
                                    <label
                                        class="text-blue border-blue hover:bg-blue flex w-48 cursor-pointer flex-col items-center rounded-lg border bg-white p-2 tracking-wide shadow-lg hover:bg-indigo-500 hover:text-white">

                                        <span class="text-base leading-normal">Upload Foto Baru</span>
                                        <input type='file' name="profile_img" id="inputPicture" class="hidden"
                                            accept="image/*" value={{ Auth::user()->profile_img }}
                                            onchange="previewImage()" />
                                    </label>
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                        Username (3-50 Karakter)</label>
                                    <label class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                        </ </label>
                                        <input type="text" name="username" id="inputUsername"
                                            value="{{ $searchUser->username }}"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                            placeholder="Input Username" required="">
                                        @error('username')
                                            <div class="invalid-feedback my-1 text-sm text-red-500">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                </div>

                                <div class="sm:col-span-2">
                                    <label for="full_name"
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Nama
                                        Lengkap (3-20 Karakter)</label>
                                    <input type="text" name="full_name" id="inputFullName"
                                        value="{{ $searchUser->full_name }}"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="Input Nama Lengkap" required="">
                                    @error('full_name')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="invalid-feedback my-1 text-sm text-red-500">
                                        {{-- Error Message Design --}}
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="aboutMe"
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Tentang
                                        Saya (maks. 150 Karakter)</label>
                                    <textarea name="about_me" id="inputAboutMe"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="Silahkan isi informasi mengenai anda." required=""> {{ $searchUser->about_me }}

                                    </textarea>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <button type="submit"
                                    class="rounded bg-indigo-500 px-4 py-2 font-bold text-white hover:bg-indigo-700">
                                    Simpan Profil
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="py-4">
                <div class="border-t border-gray-300">
                </div>
            </div>
            <div class="my-4 justify-center rounded-xl md:grid md:grid-cols-3 md:gap-6">
                <div class="col-span-1 w-full">
                    <div class="h-full rounded-xl p-2 md:py-4 md:pl-8">
                        <h1
                            class="py-2 text-center text-xl font-bold tracking-normal text-gray-800 md:pb-6 md:pr-4 md:text-left lg:text-3xl">
                            Ubah Password Akun
                        </h1>
                        <p class="mb-6 text-base font-normal tracking-normal text-gray-600">
                            Anda dapat mengubah password akun anda disini.
                        </p>
                        <p class="text-base font-normal tracking-normal text-gray-600">
                            <strong>*Password harus minimal berisi 8 Karakter*</strong>
                        </p>
                        <p class="text-base font-normal tracking-normal text-gray-600">
                            <strong>*Password minimal harus mengandung huruf dan angka*</strong>
                        </p>
                    </div>
                </div>
                <div class="col-span-2 h-auto md:mx-2 md:w-10/12">
                    <div class="rounded-xl bg-white px-6 py-8 md:px-12">

                        <div class="my-4"></div>
                        <form action="/editProfile/password" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="username" value="{{ $searchUser->username }}">
                            <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for=""
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Password
                                        Lama</label>
                                    <input type="password" name="old_password" id="inputOldPass"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="Masukkan Password Lama" required="">
                                    @error('old_password')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="password"
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Password
                                        Baru</label>
                                    <input type="password" name="new_password" id="inputNewPass"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="Masukkan Password Baru" required="">
                                    @error('new_password')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="password"
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Konfirmasi
                                        Password
                                        Baru</label>
                                    <input type="password" name="confirm_password" id="inputConfirmPass"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                        placeholder="Masukkan Lagi Password Baru" required="">
                                    @error('confirm_password')
                                        <div class="invalid-feedback my-1 text-sm text-red-500">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="flex items-center space-x-4">
                                <button type="submit"
                                    class="rounded bg-indigo-500 px-4 py-2 font-bold text-white hover:bg-indigo-700">
                                    Ubah Password
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @include('modals.success_save')
        </div>

    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection

</html>
