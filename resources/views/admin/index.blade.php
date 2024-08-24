@extends('layouts.admin')
@section('AdminLayouts')
    <div>
        <div class="container p-8">
            <h1 class="text-2xl font-bold mb-4 text-center">All Users</h1>


            <div class="flex justify-center my-8">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                    class="bg-custom-green text-custom-white px-5 py-2 rounded-xl">Buat User</button>
            </div>
            <form action="{{ route('admin.index') }}" method="GET" class="flex justify-end mt-8 mb-4">
                <input type="text" name="search" placeholder="Search by Name or Email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 mx-2"
                    value="{{ request()->input('search') }}">
                <button type="submit" class="bg-custom-blue text-custom-white px-5 py-2 rounded-xl">Search</button>
            </form>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-center text-gray-700 uppercase bg-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <a href="{{ route('admin.index', [
                                    'sort_by' => 'nama',
                                    'sort_direction' =>
                                        request('sort_by') === 'nama' ? (request('sort_direction', 'asc') === 'asc' ? 'desc' : 'asc') : 'asc',
                                    'search' => request('search'),
                                ]) }}"
                                    class="{{ request('sort_by') === 'nama' ? 'font-bold' : '' }}">
                                    Nama
                                    @if (request('sort_by') === 'nama')
                                        <span>
                                            {{ request('sort_direction', 'asc') === 'asc' ? '▲' : '▼' }}
                                        </span>
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a href="{{ route('admin.index', [
                                    'sort_by' => 'email',
                                    'sort_direction' =>
                                        request('sort_by') === 'email' ? (request('sort_direction', 'asc') === 'asc' ? 'desc' : 'asc') : 'asc',
                                    'search' => request('search'),
                                ]) }}"
                                    class="{{ request('sort_by') === 'email' ? 'font-bold' : '' }}">
                                    Email
                                    @if (request('sort_by') === 'email')
                                        <span>
                                            {{ request('sort_direction', 'asc') === 'asc' ? '▲' : '▼' }}
                                        </span>
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a href="{{ route('admin.index', [
                                    'sort_by' => 'status_pendaftaran',
                                    'sort_direction' =>
                                        request('sort_by') === 'status_pendaftaran'
                                            ? (request('sort_direction', 'asc') === 'asc'
                                                ? 'desc'
                                                : 'asc')
                                            : 'asc',
                                    'search' => request('search'),
                                ]) }}"
                                    class="{{ request('sort_by') === 'status_pendaftaran' ? 'font-bold' : '' }}">
                                    Status
                                    @if (request('sort_by') === 'status_pendaftaran')
                                        <span>
                                            {{ request('sort_direction', 'asc') === 'asc' ? '▲' : '▼' }}
                                        </span>
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a href="{{ route('admin.index', [
                                    'sort_by' => 'role_id',
                                    'sort_direction' =>
                                        request('sort_by') === 'role_id' ? (request('sort_direction', 'asc') === 'asc' ? 'desc' : 'asc') : 'asc',
                                    'search' => request('search'),
                                ]) }}"
                                    class="{{ request('sort_by') === 'role_id' ? 'font-bold' : '' }}">
                                    Role
                                    @if (request('sort_by') === 'role_id')
                                        <span>
                                            {{ request('sort_direction', 'asc') === 'asc' ? '▲' : '▼' }}
                                        </span>
                                    @endif
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($users as $user)
                            <tr class="odd:bg-white even:bg-gray-100 border-b">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->nama }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($user->status_pendaftaran)
                                        <div class="text-custom-green font-extrabold">Sudah Submit</div>
                                    @else
                                        <div>Belum Submit Formulir</div>
                                    @endif

                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->role->name }}
                                </td>
                                <td class="px-6 py-4 flex justify-center">
                                    <a href="{{ route('admin.user.detail.page', $user->id) }}"
                                        class="bg-custom-blue px-5 py-2 rounded-lg text-custom-white">Detail</a>
                                    <a href="{{ route('admin.user.edit.page', $user->id) }}"
                                        class="bg-custom-yellow px-5 py-2 ms-2 rounded-lg text-custom-white">Edit</a>
                                    <form action="{{ route('delete.user', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-custom-red px-5 py-2 ms-2 rounded-lg text-custom-white"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus User ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
            class="backdrop-blur hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Buat User Aplikasi
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
                        <form class="" action="{{ route('register', 'mahasiswa') }}" method="POST">
                            @csrf
                            <div class="my-4">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Masukkan
                                    nama</label>
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
                                class="w-full my-6 text-white bg-custom-green hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Buatkan
                                Akun</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
