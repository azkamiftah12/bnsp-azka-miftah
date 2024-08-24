@extends('layouts.admin')
@section('AdminLayouts')
    <div>
        <div class="container p-8">
            <h1 class="text-2xl font-bold mb-4 text-center">Edit Users</h1>
            <form class="" action="{{ route('profile.update', $user->id) }}" method="POST" autocomplete="off"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 gap-4">

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="profile_picture">Upload
                            file</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="profile_picture" name="profile_picture" type="file">
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="name@company.com" required disabled value="{{ $user->email }}" />
                    </div>

                    <div>
                        <label for="alamat_ktp" class="block mb-2 text-sm font-medium text-gray-900">Alamat
                            KTP</label>
                        <input type="text" name="alamat_ktp" id="alamat_ktp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Alamat KTP" value="{{ old('alamat_ktp', $user->alamat_ktp) }}" required />
                    </div>

                    <div>
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Alamat" value="{{ old('alamat', $user->alamat) }}" required />
                    </div>

                    <div>
                        <label for="provinsi_id" class="block mb-2 text-sm font-medium text-gray-900">Provinsi</label>
                        <select name="provinsi_id" id="provinsi_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="" selected>Pilih Provinsi
                            </option>
                            @foreach ($provinsis as $provinsi)
                                <option value="{{ $provinsi->id }}"
                                    {{ $user->provinsi_id == $provinsi->id ? 'selected' : '' }}>
                                    {{ $provinsi->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="kabupaten_id" class="block mb-2 text-sm font-medium text-gray-900">Kabupaten</label>
                        <select name="kabupaten_id" id="kabupaten_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="" selected>Pilih Kabupaten
                            </option>
                            @foreach ($kabupatens as $kabupaten)
                                <option value="{{ $kabupaten->id }}" data-provinsi="{{ $kabupaten->provinsi_id }}"
                                    {{ $user->kabupaten_id == $kabupaten->id ? 'selected' : '' }}>
                                    {{ $kabupaten->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900">Kecamatan</label>
                        <input type="text" name="kecamatan" id="kecamatan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Kecamatan" value="{{ old('kecamatan', $user->kecamatan) }}" required />
                    </div>


                    <div>
                        <label for="nomor_telepon_rumah" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon
                            Rumah</label>
                        <input type="text" name="nomor_telepon_rumah" id="nomor_telepon_rumah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Nomor Telepon Rumah"
                            value="{{ old('nomor_telepon_rumah', $user->nomor_telepon_rumah) }}" required />
                    </div>

                    <div>
                        <label for="nomor_telepon_hp" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon
                            HP</label>
                        <input type="text" name="nomor_telepon_hp" id="nomor_telepon_hp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Nomor Telepon HP" value="{{ old('nomor_telepon_hp', $user->nomor_telepon_hp) }}"
                            required />
                    </div>

                    <div id="kewarganegaraan_country_container"
                        style="{{ $user->kewarganegaraan == 'WNA' ? '' : 'display: none;' }}">
                        <label for="kewarganegaraan_country" class="block mb-2 text-sm font-medium text-gray-900">Negara
                            Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan_country" id="kewarganegaraan_country"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Negara Kewarganegaraan"
                            value="{{ old('kewarganegaraan_country', $user->kewarganegaraan_country) }}" />
                    </div>

                    <div>
                        <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                            Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" required />
                    </div>

                    <div>
                        <label for="pilih-tempat-lahir" class="block mb-2 text-sm font-medium text-gray-900">Pilih Tempat
                            Lahir</label>
                        <select name="pilih-tempat-lahir" id="pilih-tempat-lahir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="" selected>Pilih Tempat Lahir
                            </option>
                            <option value="dalam-negeri"
                                {{ old('pilih-tempat-lahir', $user->pilih_tempat_lahir) == 'dalam-negeri' ? 'selected' : '' }}>
                                Dalam Negeri</option>
                            <option value="luar-negeri"
                                {{ old('pilih-tempat-lahir', $user->pilih_tempat_lahir) == 'luar-negeri' ? 'selected' : '' }}>
                                Luar Negeri</option>
                        </select>
                    </div>

                    <div id="dalam-negeri-fields">
                        <div class="mb-2">
                            <label for="tempat_lahir_ijasah" class="block mb-2 text-sm font-medium text-gray-900">Tempat
                                Lahir Sesuai
                                Ijazah</label>
                            <input type="text" name="tempat_lahir_ijasah" id="tempat_lahir_ijasah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tempat Lahir Sesuai Ijasah"
                                value="{{ old('tempat_lahir_ijasah', $user->tempat_lahir_ijasah) }}" />
                        </div>

                        <div class="mb-2">
                            <label for="provinsi_lahir" class="block mb-2 text-sm font-medium text-gray-900">Provinsi
                                Lahir</label>
                            <select name="provinsi_lahir" id="provinsi_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="" selected>Pilih Provinsi
                                </option>
                                @foreach ($provinsis as $provinsi)
                                    <option value="{{ $provinsi->id }}"
                                        {{ $user->provinsi_lahir == $provinsi->id ? 'selected' : '' }}>
                                        {{ $provinsi->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="kabupaten_lahir" class="block mb-2 text-sm font-medium text-gray-900">Kabupaten
                                Lahir</label>
                            <select name="kabupaten_lahir" id="kabupaten_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="" selected>Pilih Kabupaten
                                </option>
                                @foreach ($kabupatens as $kabupaten)
                                    <option value="{{ $kabupaten->id }}"
                                        data-provinsi-lahir="{{ $kabupaten->provinsi_id }}"
                                        {{ $user->kabupaten_lahir == $kabupaten->id ? 'selected' : '' }}>
                                        {{ $kabupaten->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div id="luar-negeri-fields" style="display: none;">
                        <div>
                            <label for="tempat_lahir_luar_negeri"
                                class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir Luar
                                Negeri (Jika Ada)</label>
                            <input type="text" name="tempat_lahir_luar_negeri" id="tempat_lahir_luar_negeri"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="Tempat Lahir (Luar Negeri)"
                                value="{{ old('tempat_lahir_luar_negeri', $user->tempat_lahir_luar_negeri) }}" />
                        </div>
                    </div>


                    <div>
                        <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                            Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="" selected>Pilih Jenis Kelamin
                            </option>
                            <option value="Pria" {{ $user->jenis_kelamin == 'Pria' ? 'selected' : '' }}>
                                Pria
                            </option>
                            <option value="Wanita" {{ $user->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>
                                Wanita</option>
                        </select>
                    </div>

                    <div>
                        <label for="status_menikah" class="block mb-2 text-sm font-medium text-gray-900">Status
                            Menikah</label>
                        <select name="status_menikah" id="status_menikah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="" selected>Pilih Status Menikah
                            </option>
                            <option value="Belum menikah"
                                {{ $user->status_menikah == 'Belum menikah' ? 'selected' : '' }}>Belum
                                menikah
                            </option>
                            <option value="Menikah" {{ $user->status_menikah == 'Menikah' ? 'selected' : '' }}>Menikah
                            </option>
                            <option value="Lain-lain" {{ $user->status_menikah == 'Lain-lain' ? 'selected' : '' }}>
                                Lain-lain
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="agama_id" class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                        <select name="agama_id" id="agama_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="" selected>Pilih Agama Anda
                            </option>
                            @foreach ($agamas as $agama)
                                <option value="{{ $agama->id }}"
                                    {{ $user->agama_id == $agama->id ? 'selected' : '' }}>
                                    {{ $agama->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="kewarganegaraan"
                            class="block mb-2 text-sm font-medium text-gray-900">Kewarganegaraan</label>
                        <select name="kewarganegaraan" id="kewarganegaraan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required>
                            <option value="" selected>Pilih Kewarganegaraan
                            </option>
                            <option value="WNI Asli" {{ $user->kewarganegaraan == 'WNI Asli' ? 'selected' : '' }}>WNI Asli
                            </option>
                            <option value="WNI Keturunan"
                                {{ $user->kewarganegaraan == 'WNI Keturunan' ? 'selected' : '' }}>WNI
                                Keturunan</option>
                            <option value="WNA" {{ $user->kewarganegaraan == 'WNA' ? 'selected' : '' }}>WNA</option>
                        </select>
                    </div>

                    <div id="kewarganegaraan-input-div" style="display: none;">
                        <label for="kewarganegaraan_country" class="block mb-2 text-sm font-medium text-gray-900">Masukkan
                            Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan_country" id="kewarganegaraan_country"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            value="{{ $user->kewarganegaraan_country }}">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="role_id" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                    <select name="role_id" id="role_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id === $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="flex items-center justify-center w-full mt-8">
                    <label for="video_perkenalan"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                    upload</span> or drag and drop</p>
                        </div>
                        <input id="video_perkenalan" name="video_perkenalan" type="file" class="hidden"
                            accept="video/*" />
                    </label>
                </div>

                <button type="submit"
                    class="w-full mt-8 text-white bg-custom-green focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Submit
                    Formulir
                </button>
            </form>
        </div>
    </div>
@endsection
