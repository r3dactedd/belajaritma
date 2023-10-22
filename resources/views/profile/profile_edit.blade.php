<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajaritma</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
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
                            <span class="mb-1 ml-2">Pengaturan</span>
                        </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto my-5 w-9/12 p-5">
            {{-- EDIT PROFILE --}}
            <div class="my-4 justify-center rounded-xl md:grid md:grid-cols-3 md:gap-6">
                <div class="col-span-1 w-full">
                    <div class="h-full rounded-xl p-2 md:py-4 md:pl-8">
                        <h1
                            class="py-2 text-center text-xl font-bold tracking-normal text-gray-800 md:pb-6 md:pr-4 md:text-left lg:text-3xl">
                            Ubah Informasi Profil
                        </h1>
                        <p class="text-md mb-6 font-normal tracking-normal text-gray-600">
                            Anda dapat mengubah informasi akun anda serta alamat email disini.
                        </p>
                    </div>
                </div>
                <div class="col-span-2 h-auto w-10/12 md:mx-2">
                    <div class="rounded-xl bg-white px-6 py-8 md:px-12">
                        <form action="/editProfile" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="profilePicture"
                                class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Gambar
                                Profil</label>
                            <div class="mb-2 w-full md:w-3/12">
                                <div class="h-fit w-auto">
                                    <img id="profile-preview" class="h-32 w-32 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_img ? '/storage/images/' . Auth::user()->profile_img : 'https://tuk-cdn.s3.amazonaws.com/assets/components/horizontal_navigation/hn_1.png' }}">
                                </div>
                            </div>
                            <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                <div class="max-w-md">
                                    <label
                                        class="text-blue border-blue hover:bg-blue flex w-48 cursor-pointer flex-col items-center rounded-lg border bg-white p-2 tracking-wide shadow-lg hover:bg-indigo-500 hover:text-white">

                                        <span class="text-base leading-normal">Upload Foto Baru</span>
                                        <input type='file' name="profile_img" id="inputPicture" class="hidden" accept="image/*" value={{ Auth::user()->profile_img }}
                                            onchange="previewImage()" />
                                    </label>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="username"
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">
                                        Username </label>
                                    <input type="text" name="username" id="inputUsername"
                                        value={{$searchUser->username}}
                                        class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                        placeholder="Input Username" required="">
                                    <div class="invalid-feedback my-1 text-sm text-red-500">
                                        Error Message Design
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="full_name"
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Nama
                                        Lengkap </label>
                                    <input type="text" name="full_name" id="inputFullName"
                                        value={{$searchUser->full_name}}
                                        class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                        placeholder="Input Nama Lengkap" required="">
                                    <div class="invalid-feedback my-1 text-sm text-red-500">
                                        Error Message Design
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="email"
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Email</label>
                                    <input type="text" name="email" id="inputEmail" value={{$searchUser->email}}
                                        class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                        placeholder="Email" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="email"
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Tentang
                                        Saya</label>
                                    <textarea name="about_me" id="inputAboutMe"
                                        class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                        placeholder="Silahkan isi informasi mengenai anda."  required=""> {{$searchUser->about_me}}
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
            <div class="py-8">
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
                        <p class="text-md mb-6 font-normal tracking-normal text-gray-600">
                            Anda dapat mengubah informasi akun anda serta alamat email disini.
                        </p>
                    </div>
                </div>
                <div class="col-span-2 h-auto w-10/12 md:mx-2">
                    <div class="rounded-xl bg-white px-6 py-8 md:px-12">
                        <form action="/editProfile/password" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4 grid gap-4 sm:mb-5 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for=""
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Password
                                        Lama</label>
                                    <input type="password" name="old_password" id="inputOldPass"
                                        class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                        placeholder="Masukkan Password Lama" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="password"
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Password
                                        Baru</label>
                                    <input type="password" name="new_password" id="inputNewPass"
                                        class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                        placeholder="Masukkan Password Baru" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="password"
                                        class="mb-2 block text-sm font-semibold text-gray-900 dark:text-white">Konfirmasi
                                        Password
                                        Baru</label>
                                    <input type="password" name="confirm_password" id="inputConfirmPass"
                                        class="focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900"
                                        placeholder="Masukkan Lagi Password Baru" required="">
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

        </div>

    @endsection
    @section('footer')
        @include('layout.footer')
    @endsection

</html>
