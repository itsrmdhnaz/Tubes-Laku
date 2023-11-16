<nav>
    <ul id="dynamicContent" class="flex flex-col gap-8">
        <li>
            {{-- <a href="{{ route('home') }}"> --}}
                <img src="{{ asset('logo.svg') }}" alt="Nama Gambar" class="mx-auto w-80">
            {{-- </a> --}}
        </li>
        <li class="flex flex-col items-center justify-center gap-3">
            <a href="{{ route('home') }}">
                <img src="{{ asset('image 13.svg') }}" alt="Nama Gambar" class="w-32 mx-auto">
            </a>
            <span
                class="{{ isset($title) === 'Home' || isset($title) === 'dashboard' ? 'text-[#3AB86D] font-bold' : '' }}">Home</span>
        </li>
        <li class="flex flex-col items-center justify-center gap-3">
            <a href="{{ route('notification') }}">
            {{-- <button onclick="notification()"> --}}
                <div class="relative">
                    <img src="{{ asset('image 14.svg') }}" alt="Nama Gambar" class="w-32 mx-auto">
                    @livewire('notification')
                </div>
            {{-- </button> --}}
            </a>
            <span
                class="{{ isset($title) && $title === 'notifikasi' ? 'text-[#3AB86D] font-bold' : '' }}">Notifikasi</span>
        </li>

        <li class="flex flex-col items-center justify-center gap-3">
            <a href="{{ route('list.order') }}">
                <img src="{{ asset('Group 2089.svg') }}" alt="Nama Gambar" class="w-32 mx-auto">
            </a>
            <span class="{{ isset($title) === 'daftarpesanan' ? 'text-[#3AB86D] font-bold' : '' }}">Daftar
                Pesanan</span>
        </li>
    </ul>
</nav>

