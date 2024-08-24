@extends('layouts.app')
@section('content')
    <div class="flex justify-center items-center p-20">
        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="" action="{{ route('register', 'admin') }}" method="POST">
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
                        class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg w-full p-2.5" required
                        value="{{ old('password') }}" />
                </div>
                <button type="submit"
                    class="w-full my-6 text-white bg-custom-green hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Daftar
                    Akun Admin
                </button>
                <p class="text-sm font-light text-custom-blue">
                    Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-custom-yellow hover:underline">
                        Login disini
                    </a>
                </p>
            </form>
        </div>
    </div>
@endsection
