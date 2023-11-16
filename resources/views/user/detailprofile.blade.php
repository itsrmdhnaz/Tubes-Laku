@extends('layouts.main2')

@section('container')
    <div class="flex justify-between p-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold">Profile</h1>
        </div>
        <div class="flex justify-end w-full">
            <a href="{{ route('edit.profile') }}"
                class="text-white bg-[#3AB86D] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit
                Profile</a>
        </div>
    </div>
    <div class="flex-col px-5">
        <div class="mb-4">
            <h2 class="text-lg font-semibold">Nama</h2>
            <p class="p-2 bg-blue-200 rounded-lg">{{ $user->name }}</p>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-semibold">No Handphone</h2>
            <p class="p-2 bg-blue-200 rounded-lg">{{ $address->phone }}</p>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-semibold">Email</h2>
            <p class="p-2 bg-blue-200 rounded-lg">{{ $user->email }}</p>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-semibold">Kelamin</h2>
            <p class="p-2 bg-blue-200 rounded-lg">{{ $user->gender == 'P' ? 'Perempuan' : 'Laki - Laki' }}</p>
        </div>
        <div class="mb-4">
            <h2 class="text-lg font-semibold">Alamat utama</h2>
            <p class="p-2 bg-blue-200 rounded-lg">{{ $address->address }}</p>
        </div>
        @if ($anotherAddress->count() > 0)
            <div class="mb-4">
                <h2 class="text-lg font-semibold">Alamat lain</h2>
                @foreach ($anotherAddress as $item)
                    <p class="p-2 bg-blue-200 rounded-lg">{{ $item->address }}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection
