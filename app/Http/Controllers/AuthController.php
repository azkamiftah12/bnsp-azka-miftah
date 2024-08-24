<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function pageRegister(){
        return view('register');
    }
    public function register(Request $request, $role)
    {
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ],[
            'nama.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Masukkan format email yang benar.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password setidaknya 8 karakter.',
        ]);
        

        if ($validator->fails()) {
            $firstError = $validator->errors()->first();
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $firstError);
        }

        $Role = Role::where('name', $role)->firstOrFail();
        
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $Role->id,
        ]);

        // Auth::login($user);

        if($Role->name === 'admin'){
            return redirect()->route('admin.index')->with('success', 'Buat User Berhasil.');
        }
        else{
            return redirect()->route('login')->with('success', 'Registrasi Admin Berhasil');
        }

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role->name === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role->name === 'mahasiswa') {
                return redirect()->route('mahasiswa.index');
            }
        }

        return redirect()->route('login')->with('error', 'Kombinasi Email dan Password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }



}
