<div class="h-screen max-w-full">
    <div class="">
        <!-- Left Side -->
        <div class="p-6 rounded-[25px] mt-8">
          <a href="#">
            <img src="{{ asset('logo.svg') }}" alt="Logo LAKU!" class="w-40 mx-auto">
          </a>
        </div>

      <main class="w-full mb-16">
        <!-- Main content -->
        <div class="mb-10 mx-96 w-max">
          <h1 class="text-4xl font-bold">Masuk</h1>
        </div>
        <div class="mt-6 mx-96">
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">

                <div class="md:col-span-2 md:w-[100%]">
                    <label for="email" class="block mb-2 text-sm font-medium text-black dark:text-black">
                      <h1 class="text-xl ">email</h1>
                    </label>
                <div class="relative">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                      @error('email')
                      <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-red-500">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      @elseif(!empty($email))
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#42BB73]">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                       @enderror
                    </div>
                    <input type="email" id="email" name="email" wire:model="email"
                    class="border @error('email') !border-red-500  @else focus:ring-[#42BB73] focus:border-[#42BB73] @enderror h-12 text-black text-sm rounded-lg  block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black focus:outline-none  focus:ring-0"
                    placeholder="User email">
                </div>
                  @error('email')
                    <p class="block pt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
                </div>

            <div class="md:col-span-2 md:w-[100%]">
                <label for="password" class="block mb-2 text-sm font-medium text-black dark:text-black">
                  <h1 class="text-xl ">password</h1>
                </label>
            <div class="relative">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  @error('password')
                  <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-red-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  @elseif(!empty($password))
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#42BB73]">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>
                   @enderror
                </div>
                <input type="password" id="password" name="password" wire:model="password"
                class="border @error('password') !border-red-500  @else focus:ring-[#42BB73] focus:border-[#42BB73] @enderror h-12 text-black text-sm rounded-lg  block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black focus:outline-none  focus:ring-0"
                placeholder="User password">
            </div>
              @error('password')
                <p class="block pt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>

            <div id="login" class="flex items-center justify-center col-span-2 mt-6">
              <button type="submit"
                class="w-72 border h-20 transition active:scale-95 text-[#42BB73] border-[#42BB73] p-3 px-5 rounded-lg hover:bg-[#42BB73] hover:text-white">Masuk
                </button>
            </div>
          </form>
        </div>
        </main>
</div>
</div>
