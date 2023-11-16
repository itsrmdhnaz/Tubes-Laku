<div>
    <div class="flex flex-col items-center justify-center gap-1 mb-3 text-center">
        <img src="{{ asset('avatar/'.$user->avatar) }}" alt="" class="w-20 rounded-full">
        <h1 class="text-xl">{{ $user->name }}</h1>
        </div>
        <div class="flex flex-col items-center justify-center gap-3">
        <a href="{{ route('detail.profile') }}">
                <button class="px-5 h-8 text-center text-white rounded-[10px] bg-[#3AB86D]">
                detail profil
                </button>
             </a>
        <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <button class="px-5 h-8 text-white text-center  rounded-[10px] bg-[#3AB86D]">
                Log out
                </button>
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
</div>
