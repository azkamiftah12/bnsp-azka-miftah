@extends('layouts.admin')
@section('AdminLayouts')
    <div>
        <div class="container p-8 flex flex-col justify-center items-center">
            <h1 class="text-2xl font-bold mb-4 text-center">Detail User</h1>
            <x-user-detail :user="$user" />
        </div>
    </div>
@endsection
