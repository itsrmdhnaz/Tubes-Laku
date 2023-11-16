@extends('layouts.main2')
@section('container')
<div class="flex flex-col gap-8 px-12 py-4">
    <h1 class="text-3xl font-semibold">Notifikasi</h1>
        @livewire('notification-kurir-list')
</div>
@endsection
@section('profile')
<div class="rounded-full overflow-hidden max-w-[50%] h-24">
    <img src="{{ asset('cowo.svg') }}" alt="">
</div>
    <h1 class="py-2 text-lg text-center">{{ $user->name }}</h1>

    <div class="flex flex-col w-[60%] gap-4 text-white">
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
        <button class="w-full h-8 rounded-[10px] bg-[#3AB86D]">
        Lihat detail
        </button>
     </a>
        <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
        <button class="w-full h-8 rounded-[10px] bg-[#3AB86D] mb-4">
        Log out
        </button>
     </a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </div>
@endsection
