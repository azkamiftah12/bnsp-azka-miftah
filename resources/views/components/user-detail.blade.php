<div class="mt-4 p-8">
    @if ($user->status_pendaftaran)

        <div class="flex flex-col rounded-md pt-8 p-4 bg-white" id="print">
            <div class="text-center text-2xl font-extrabold mb-4">
                Formulir Pendaftaran
            </div>
            <div class="flex flex-col justify-center items-center mb-4">

                @if ($user->profile_picture)
                    <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture"
                        class="w-32 h-32 mb-3 rounded-full shadow-lg">
                @else
                    <img src="{{ asset('storage/profile_pictures/default.png') }}" alt="Default Profile Picture"
                        class="w-32 h-32 mb-3 rounded-full shadow-lg">
                @endif

                <div class="text-xl capitalize font-bold text-custom-blue my-2">{{ $user->nama }}</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-6">
                <div>
                    <div class="text-gray-500">Nama Lengkap</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->nama }}
                    </div>
                    <div class="text-gray-500">Jenis Kelamin</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->jenis_kelamin }}
                    </div>
                    <div class="text-gray-500">Agama</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->agama->name }}
                    </div>
                    <div class="text-gray-500">No Telephone</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->nomor_telepon_rumah }}
                    </div>
                    <div class="text-gray-500">Alamat KTP</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->alamat_ktp }}
                    </div>
                    <div class="text-gray-500">Provinsi</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->provinsi->name }}
                    </div>
                    <div class="text-gray-500">Kecamatan</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->kecamatan }}
                    </div>

                    <div class="text-gray-500">Tempat Lahir Sesuai Ijasah</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->tempat_lahir_ijasah ?? '-' }}
                    </div>

                    <div class="text-gray-500">Provinsi Lahir</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->provinsiLahir->name ?? '-' }}
                    </div>


                    <div class="text-gray-500">Kabupaten Lahir</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->kabupatenLahir->name ?? '-' }}
                    </div>


                </div>
                <div>
                    <div class="text-gray-500">Email</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->email }}
                    </div>
                    <div class="text-gray-500">Status Menikah</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->status_menikah }}
                    </div>
                    <div class="text-gray-500">Terdaftar Pada</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ date('d-m-Y - H:i', strtotime($user->updated_at)) }}
                    </div>
                    <div class="text-gray-500">No. HP</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->nomor_telepon_hp ?? '-' }}
                    </div>
                    <div class="text-gray-500">Alamat Lengkap Saat Ini</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->alamat }}
                    </div>
                    <div class="text-gray-500">Kabupaten</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->kabupaten->name }}
                    </div>
                    <div class="text-gray-500">Tanggal Lahir Sesuai ijasah</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->tanggal_lahir }}
                    </div>

                    <div class="text-gray-500">Kewarganegaraan</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->kewarganegaraan }}
                    </div>

                    <div class="text-gray-500">Kewarganegaraan WNA</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->kewarganegaraan_country ?? '-' }}
                    </div>
                    <div class="text-gray-500">Tempat Lahir Luar Negeri</div>
                    <div class="font-medium mb-4 capitalize">
                        {{ $user->tempat_lahir_luar_negeri ?? '-' }}
                    </div>


                </div>

            </div>
        </div>
        <div class="bg-white py-4">

            <div class="border border-gray-300"></div>
            <div class="flex justify-center my-8 no-print">
                @if ($user->video_perkenalan)
                    <div class="flex flex-col gap-4 text-center">

                        <div class="text-lg font-bold">Video Perkenalan</div>
                        <video width="600" height="400" controls>
                            <source src="{{ asset('storage/' . $user->video_perkenalan) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @else
                    <p>Anda Belum Upload Video Perkenalan.</p>
                @endif
            </div>

        </div>
    @endif
</div>
