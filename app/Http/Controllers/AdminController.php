<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agama;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Role;

class AdminController extends Controller
{
    public function adminIndex(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        }

        $sortBy = $request->input('sort_by', 'nama'); // Default sort by 'nama'
    $sortDirection = $request->input('sort_direction', 'asc'); // Default to ascending

    if (in_array($sortBy, ['nama', 'email', 'status_pendaftaran', 'role_id'])) {
        if ($sortBy === 'role_id') {
            $query->join('roles', 'users.role_id', '=', 'roles.id')
                  ->orderBy('roles.name', $sortDirection)
                  ->select('users.*'); // Only select columns from 'users' table
        } else {
            $query->orderBy($sortBy, $sortDirection);
        }
    }


        $users = $query->get();

        return view('admin.index', compact('users'));
    }

    public function detailUserPage($user_id){
        $user = User::findOrFail($user_id)->first();
        return view('admin.detail-user', compact('user'));
    }

    public function editUserPage($user_id){
        $user = User::where('id', $user_id)->first();
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        $agamas = Agama::all();
        $roles = Role::all();
        return view('admin.edit-user', compact('user', 'provinsis', 'kabupatens', 'agamas', 'roles'));
    }

    public function adminPendaftar(Request $request)
{
    // Initialize the query and filter users with status_pendaftaran = true
    $query = User::where('status_pendaftaran', true);

    // Check if there's a search query, and apply it if present
    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where(function ($q) use ($search) {
            $q->where('nama', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%");
        });
    }

    // Get the filtered and possibly searched users
    $users = $query->get();

    // Return the view with the filtered users
    return view('admin.pendaftar-user', compact('users'));
}


    public function deleteUser($user_id){
        User::findOrFail($user_id)->delete();
        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }

    public function updateUser(){

    }
}
