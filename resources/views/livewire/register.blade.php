<div>
        <div class="xl:w-[1451px] 2xl:[2000px] mx-auto">
            <!-- Left Side -->
            <div class="p-6 rounded-[25px] mt-8">
              <a href="#">
                <img src="{{ asset('logo.svg') }}" alt="Logo LAKU!" class="w-40 mx-auto">
              </a>
            </div>

          <main class="w-full mb-16">
            <!-- Main content -->
            <div class="mb-10 mx-96 w-max">
              <h1 class="text-4xl font-bold">Buat akun</h1>
            </div>
            <div class="mt-6 mx-96">
                <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">

                  <div class="md:col-span-1 md:w-[100%]">
                      <label for="name" class="block mb-2 text-sm font-medium text-black dark:text-black">
                        <h1 class="text-xl ">Nama Pengguna</h1>
                      </label>
                  <div class="relative">
                      <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        @error('name')
                        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        @elseif(!empty($name))
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#42BB73]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                         @enderror
                      </div>
                      <input type="text" id="name" name="name" wire:model="name" value="{{ old('name') }}"
                      class="border @error('name') !border-red-500  @else focus:ring-[#42BB73] focus:border-[#42BB73] @enderror h-12 text-black text-sm rounded-lg  block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black focus:outline-none  focus:ring-0"
                      placeholder="User name">
                  </div>
                @error('name')
                      <p class="pt-2 text-xs text-red-500">{{ $message }}</p>
                  @enderror
                  </div>


                  <div class="md:col-span-1 md:w-[100%]">
                  <label for="email" class="block mb-2 text-sm font-medium text-black dark:text-black">
                    <h1 class="text-xl ">Email</h1>
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
                  <input type="text" id="email" name="email" wire:model="email" value="{{ old('email') }}"
                  class="border @error('email') !border-red-500  @else focus:ring-[#42BB73] focus:border-[#42BB73] @enderror h-12 text-black text-sm rounded-lg  block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black focus:outline-none  focus:ring-0"
                  placeholder="User email">
              </div>
                @error('email')
                  <p class="block pt-2 text-xs text-red-500">{{ $message }}</p>
              @enderror
              </div>

              <div class="md:col-span-2 md:w-[100%]">
                <label for="address" class="block mb-2 text-sm font-medium text-black dark:text-black">
                  <h1 class="text-xl ">Alamat</h1>
                </label>
            <div class="relative">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  @error('address')
                  <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-red-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  @elseif(!empty($address))
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#42BB73]">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>
                   @enderror
                </div>
                <input type="text" id="address" name="address" wire:model="address" value="{{ old('address') }}"
                class="border @error('address') !border-red-500  @else focus:ring-[#42BB73] focus:border-[#42BB73] @enderror h-12 text-black text-sm rounded-lg  block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black focus:outline-none  focus:ring-0"
                placeholder="User address">
            </div>
              @error('address')
                <p class="block pt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>

            <div class="md:col-span-1 md:w-[100%]">
                <label for="phone" class="block mb-2 text-sm font-medium text-black dark:text-black">
                  <h1 class="text-xl ">No telfon</h1>
                </label>
            <div class="relative">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  @error('phone')
                  <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-red-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  @elseif(!empty($phone))
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#42BB73]">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                  </svg>
                   @enderror
                </div>
                <input type="text" id="phone" name="phone" wire:model="phone" value="{{ old('phone') }}"
                class="border @error('phone') !border-red-500  @else focus:ring-[#42BB73] focus:border-[#42BB73] @enderror h-12 text-black text-sm rounded-lg  block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black focus:outline-none  focus:ring-0"
                placeholder="User phone">
            </div>
              @error('phone')
                <p class="block pt-2 text-xs text-red-500">{{ $message }}</p>
            @enderror
            </div>

                  <label for="gender" class="flex flex-col gap-4 text-sm font-medium text-black gender">
                    <h1 class="text-xl">Kelamin</h1>
                    <div class="flex justify-center gap-6">
                        <input class="hidden @error('gender') is-invalid @enderror " id="radio_1" type="radio" name="gender" value="L"
                            checked>
                        <label
                            class="w-32 p-4 my-auto text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer"
                            for="radio_1">
                            Laki Laki
                        </label>
                        <input class="hidden @error('gender') is-invalid @enderror " id="radio_2" type="radio" name="gender" value="P">
                        <label
                            class="w-32 p-4 text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer"
                            for="radio_2">
                            Perempuan
                        </label>
                        <div class="invalid-feedback">

                        </div>

                    </div>
                </label>

                <div class="md:col-span-1 md:w-[100%]">
                    <label for="password" class="flex justify-between block mb-2 text-sm font-medium text-black dark:text-black">
                      <h1 class="text-xl ">password</h1>
                      <div class="relative">
                      <button type="button" class="absolute password_peek right-[0px] peek_password top-12">
                        <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                    </button>
                    <button type="button" class="hidden absolute close_peek_password right-[0px] top-12">
                        <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                          </svg>
                    </button>
                </div>
                    </label>
                <div class="relative w-[89%]">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none ">
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
                    class="border @error('password') !border-red-500  @else focus:ring-[#42BB73] focus:border-[#42BB73] @enderror w-full h-12 text-black text-sm rounded-lg  block  p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black focus:outline-none  focus:ring-0"
                    placeholder="User password">
                </div>
                  @error('password')
                    <p class="block pt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
                </div>

                <div class="md:col-span-1 md:w-[100%]">
                    <label for="password_confirmation" class="flex justify-between block mb-2 text-sm font-medium text-black dark:text-black">
                      <h1 class="text-xl ">Konfirmasi password</h1>
                      <div class="relative">
                      <button type="button" class="absolute right-[0px] peek_confirmation top-12">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                    </button>
                    <button type="button" class="hidden close_peek_confirmation absolute right-[0px] top-12">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                          </svg>
                    </button>
                </div>
                    </label>
                <div class="relative w-[89%]">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none ">
                      @error('password_confirmation')
                      <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-red-500">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      @elseif(!empty($password_confirmation))
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-[#42BB73]">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                      </svg>
                       @enderror
                    </div>
                    <input type="password" id="password_confirmation" name="password_confirmation" wire:model="password_confirmation"
                    class="border @error('password_confirmation') !border-red-500  @else focus:ring-[#42BB73] focus:border-[#42BB73] @enderror w-full h-12 text-black text-sm rounded-lg  block  p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black focus:outline-none  focus:ring-0"
                    placeholder="User password confirmation">
                </div>
                  @error('password_confirmation')
                    <p class="block pt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
                </div>
                </div>

                <div class="flex items-start mb-6">
                  <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value=""
                      class="w-4 h-4 border border-gray-300 rounded focus:ring-3 focus:ring-[#42BB73] dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-[#42BB73] dark:ring-offset-gray-800"
                    >
                  </div>
                  <label for="remember" class="ml-2 text-sm font-medium text-black dark:text-gray-300">Saya menyutujui semua
                    syarat dan ketentuan.</label>
                </div>
                <div id="signup" class="flex items-center justify-center mt-12">
                  <button type="submit"
                    class="w-72 border h-20 transition active:scale-95 text-[#42BB73] border-[#42BB73] p-3 px-5 rounded-lg hover:bg-[#42BB73] hover:text-white">Buat
                    Akun</button>
              </form>
            </div>
            </main>
    </div>
