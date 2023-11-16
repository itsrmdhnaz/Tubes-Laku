@extends('layouts.landing')

@section('container')
    <!-- Left Side -->
    <div class="p-6 rounded-[25px] mt-20">
      <a href="#">
      <img src="{{ asset('logo.svg') }}" alt="Nama Gambar" class="mx-auto w-80">
      </a>
    </div>


    <div class="mx-auto mt-16 w-max">
    @if (Route::has('login'))
            @auth
                <div class="mx-auto mt-12 w-max">
                    @if (auth()->user()->role === 'user')
                    <a href="{{ url('/home') }}">
                        <button type="button"
                          class="w-72 border h-20 transition active:scale-95 text-[#42BB73] border-[#42BB73] p-3 px-5 rounded-lg hover:bg-[#42BB73] hover:text-white">
                          <h1 class="text-xl">Masuk</h1>
                        </button>
                      </a>
                    @elseif (auth()->user()->role === 'kurir')
                    <a href="{{ route('kurir.home') }}">
                        <button type="button"
                          class="w-72 border h-20 transition active:scale-95 text-[#42BB73] border-[#42BB73] p-3 px-5 rounded-lg hover:bg-[#42BB73] hover:text-white">
                          <h1 class="text-xl">Masuk</h1>
                        </button>
                      </a>
                    @elseif (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.home') }}">
                        <button type="button"
                          class="w-72 border h-20 transition active:scale-95 text-[#42BB73] border-[#42BB73] p-3 px-5 rounded-lg hover:bg-[#42BB73] hover:text-white">
                          <h1 class="text-xl">Masuk</h1>
                        </button>
                      </a>
                    @endif
                </div>
            @else
                <div class="mx-auto mt-12 w-max">
                    <a href="{{ route('login') }}">
                      <button type="button"
                        class="w-72 border h-20 transition active:scale-95 text-[#42BB73] border-[#42BB73] p-3 px-5 rounded-lg hover:bg-[#42BB73] hover:text-white">
                        <h1 class="text-xl">Masuk</h1>
                      </button>
                    </a>
                </div>
                @if (Route::has('register'))
                <div class="mx-auto mt-12 w-max">
                    <a href="{{ route('register') }}">
                        <button type="button"
                          class="w-72 border h-20 transition active:scale-95 text-[#42BB73] border-[#42BB73] p-3 px-5 rounded-lg hover:bg-[#42BB73] hover:text-white">
                          <h1 class="text-xl">Buat akun</h1>
                        </button>
                      </a>
                </div>
                @endif
            @endauth
    @endif
@endsection
