@extends('layouts.admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Profil Admin</h1>
        <a href="{{ route('admin.profile.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Edit Profil
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h2 class="text-lg font-semibold mb-2">Informasi Dasar</h2>
                <div class="space-y-4">
                    <div>
                        <p class="text-gray-500">Nama</p>
                        <p class="font-medium">{{ auth()->user()->nama }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email</p>
                        <p class="font-medium">{{ auth()->user()->email }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Role</p>
                        <p class="font-medium capitalize">{{ auth()->user()->role }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection