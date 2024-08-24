@extends('layouts.app')
@section('content')
    <section class="bg-custom-white">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-custom-blue rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-custom-white md:text-2xl">
                        Login
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login.attempt') }}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-custom-white">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-custom-blue rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="nama@email.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-custom-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-custom-blue rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                required="">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-custom-green hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign
                            in
                        </button>
                    </form>
                    {{-- <p class="text-sm font-light text-custom-white">
                        Belum mempunyai akun? <button data-modal-target="authentication-modal"
                            data-modal-toggle="authentication-modal" class="font-medium text-custom-yellow hover:underline"
                            type="button">
                            Daftar disini
                        </button>
                    </p> --}}
                </div>
            </div>
        </div>
    </section>


    {{-- <!-- Modal toggle -->


    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="backdrop-blur hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Daftar Akun Untuk Login
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="my-4">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Masukkan
                                name</label>
                            <input type="nama" name="nama" id="nama"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg w-full p-2.5"
                                placeholder="Nama Anda" value="{{ old('nama') }}" required />
                        </div>
                        <div class="my-4">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Masukkan
                                Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg w-full p-2.5"
                                placeholder="nama@email.com" value="{{ old('email') }}" required />
                        </div>
                        <div class="my-4">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your
                                password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg w-full p-2.5"
                                required value="{{ old('password') }}" />
                        </div>
                        <button type="submit"
                            class="w-full my-6 text-white bg-custom-green hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar
                            Akun</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
