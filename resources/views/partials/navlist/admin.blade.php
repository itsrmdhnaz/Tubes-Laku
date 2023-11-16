<nav>
    <ul class="flex flex-col gap-8">
        <li>
            <a href="">
                <img src="{{ asset('logo.svg') }}" alt="Nama Gambar" class="mx-auto w-80">
            </a>
        </li>
        <li class="flex flex-col items-center justify-center gap-3">
            <a href="{{ route('admin.home') }}">
                <img src="{{ asset('image 13.svg') }}" alt="Nama Gambar" class="w-32 mx-auto">
            </a>
            <span class="{{ (isset($title) === "Home" || isset($title) === "dashboard") ? 'text-[#3AB86D] font-bold' : ''}}">Home</span>
        </li>
        {{-- <li class="flex flex-col items-center justify-center gap-3">
            <a href="">
                <img src="{{ asset('image 14.svg') }}" alt="Nama Gambar" class="w-32 mx-auto">
            </a>
            <span class="{{ (isset($title) === "notifikasi") ? "text-[#3AB86D] font-bold" : ""}}">Notifikasi</span>
        </li> --}}
        <li class="flex flex-col items-center justify-center gap-3">
            <a href="{{ route('admin.daftar.pesanan') }}">
                <img src="{{ asset('Group 2089.svg') }}" alt="Nama Gambar" class="w-32 mx-auto">
            </a>
            <span class="{{ (isset($title) === "daftarpesanan") ? "text-[#3AB86D] font-bold" : ""}}">Daftar Pesanan</span>
        </li>
        <li class="flex flex-col items-center justify-center gap-3">
            <a href="{{ route('admin.managemen') }}">
                <img src="{{ asset('image 27.svg') }}" alt="Nama Gambar" class="w-32 mx-auto">
            </a>
            <span class="{{ (isset($title) === "managemen") ? "text-[#3AB86D] font-bold" : ""}}">Managemen</span>
        </li>
    </ul>
</nav>

