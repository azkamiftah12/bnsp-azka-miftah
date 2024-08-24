<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Models\User;
use App\Models\Role;
use App\Models\Agama;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function mahasiswaIndex(){
        $user= Auth::user();
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        $agamas = Agama::all();
        return view('mahasiswa.index', compact('user', 'provinsis', 'kabupatens', 'agamas'));
    }

    public function updateProfile(Request $request, $id)
{
    // dd($request);
    $validator = Validator::make($request->all(),[
        'alamat_ktp' => 'nullable|string',
        'alamat' => 'nullable|string',
        'kecamatan' => 'nullable|string',
        'kabupaten_id' => 'nullable|exists:kabupaten,id',
        'provinsi_id' => 'nullable|exists:provinsi,id',
        'nomor_telepon_rumah' => 'nullable|string|numeric',
        'nomor_telepon_hp' => 'nullable|string|numeric',
        'kewarganegaraan' => 'nullable|in:WNI Asli,WNI Keturunan,WNA',
        'kewarganegaraan_country' => 'nullable|string',
        'tanggal_lahir' => 'nullable|date',
        'tempat_lahir_ijasah' => 'nullable|string',
        'kabupaten_lahir' => 'nullable|exists:kabupaten,id',
        'provinsi_lahir' => 'nullable|exists:provinsi,id',
        'tempat_lahir_luar_negeri' => 'nullable|string',
        'jenis_kelamin' => 'nullable|in:Pria,Wanita',
        'status_menikah' => 'nullable|in:Belum menikah,Menikah,Lain-lain',
        'agama_id' => 'nullable|exists:agama,id',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'video_perkenalan' => 'nullable|mimetypes:video/mp4,video/mpeg,video/quicktime|max:100480',
        'role_id' => 'nullable',
    ],[
        'nomor_telepon_hp.numeric' => 'Nomor telephone harus berupa angka.',
        'profile_picture.mimes' => 'Format gambar tidak sesuai',
        'profile_picture.max' => 'ukuran gambar maximal 2mb',
        'video_perkenalan.max' => 'ukuran video maximal 100mb',
    ]);

    if ($validator->fails()) {
        $firstError = $validator->errors()->first();
        return redirect()->back()->withErrors($validator)->withInput()->with('error', $firstError);
    }

    $user = User::findOrFail($id);

    if ($request->hasFile('video_perkenalan')) {
        if ($user->video_perkenalan && Storage::exists('public/' . $user->video_perkenalan)) {
            Storage::delete('public/' . $user->video_perkenalan);
        }

        $path = $request->file('video_perkenalan')->store('videos', 'public');
        $user->video_perkenalan = $path;
    }

    if ($request->hasFile('profile_picture')) {
        if ($user->profile_picture && Storage::exists('public/profile_pictures/' . $user->profile_picture)) {
            Storage::delete('public/profile_pictures/' . $user->profile_picture);
        }
        $file = $request->file('profile_picture');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/profile_pictures', $filename);
        $user->profile_picture = $filename;
    }

    $user->update($request->only(
        'alamat_ktp',
        'alamat',
        'kecamatan',
        'kabupaten_id',
        'provinsi_id',
        'nomor_telepon_rumah',
        'nomor_telepon_hp',
        'kewarganegaraan',
        'kewarganegaraan_country',
        'tanggal_lahir',
        'tempat_lahir_ijasah',
        'kabupaten_lahir',
        'provinsi_lahir',
        'tempat_lahir_luar_negeri',
        'jenis_kelamin',
        'status_menikah',
        'agama_id',
        'role_id',
    ));
    $user->status_pendaftaran = true;
    $user->save();

    return redirect()->back()->with('success', 'Perubahan Formulir Pendaftaran Berhasil disimpan.');
}

}
