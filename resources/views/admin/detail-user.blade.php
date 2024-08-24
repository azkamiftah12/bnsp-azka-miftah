@extends('layouts.admin')
@section('AdminLayouts')
    <div>
        <div class="container p-8 flex flex-col justify-center items-center">
            <h1 class="text-2xl font-bold mb-4 text-center">Detail User</h1>
            @if ($user->profile_picture)
                <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture"
                    class="w-32 h-32 -mb-24 rounded-full shadow-lg z-10">
            @else
                <img src="{{ asset('storage/profile_pictures/default.png') }}" alt="Default Profile Picture"
                    class="w-32 h-32 rounded-full shadow-lg">
            @endif
            <x-user-detail :user="$user" />
        </div>
    </div>
@endsection
