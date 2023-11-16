<div>
    <div class="flex justify-between p-4 mb-6">
        <div>
            <h1 class="text-3xl font-bold">Edit Profile</h1>
        </div>
    </div>
    <div class="max-h-[760px] overflow-y-auto">
        <label for="name" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
            NAMA LENGKAP
            <input
                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md name"
                type="text" placeholder="" name="name" value="{{ $user->name }}"/>
        </label>
        <div class="save_error_name"></div>
        <label for="phone" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
            NO TELEPON
            <input
                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md phone"
                type="number" name="phone" value="{{ $address->phone }}"/>
        </label>
        <div class="save_error_phone"></div>
        <label for="email" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
            EMAIL
            <input
                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md email"
                type="text" placeholder="" name="email" value="{{ $user->email }}"/>
        </label>
        <div class="save_error_email"></div>
        <label  class=" text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
            KELAMIN
            <div class="flex justify-center gap-6">
                <input class="hidden gender_add" id="radio_1" type="radio" name="gender"
                    value="L" {{ ($user->gender === 'L') ? 'checked' : '' }}>
                <label
                    class="w-32 p-4 my-auto text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer"
                    for="radio_1">
                    Laki Laki
                </label>
                <input class="hidden gender_add" id="radio_2" type="radio" name="gender"
                    value="P" {{ ($user->gender === 'P') ? 'checked' : ''}}>
                <label
                    class="w-32 p-4 text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer"
                    for="radio_2">
                    Perempuan
                </label>
            </div>
        </label>
        <label for="address" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
            ALAMAT
            <input
                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md address"
                type="text" name="address" value="{{ $address->address }}"/>
        </label>
        <div class="save_error_address"></div>
        <label for="password" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
            password
            <input
                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md password"
                type="password" placeholder="isi field jika anda ingin ganti password" name="password" />
        </label>
        <div class="save_error_password"></div>
        <label for="password_confirmation" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
            Password Confirmation
            <input
                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md password_confirmation"
                type="password" placeholder="" name="password_confirmation" />
        </label>
        <div class="save_error_password_confirmation"></div>
        <label class="text-[#3AB86D] flex flex-col gap-4 mb-2 text-sm font-bold dark:text-white" for="image">Image
            <div class="flex items-center justify-center">
                <img src="{{ asset('avatar/'.$user->avatar) }}" id="preImg1" class="w-32">
            </div>
            <input id="myImage1"
            class="image w-full mb-5 text-xs file:bg-[#3AB86D] text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-[#3AB86D] dark:border-[#3AB86D] dark:placeholder-[#3AB86D]"
            name="image" type="file">
        </label>
        <div class="save_error_barang_image"></div>
        <input type="text" name="user_id" class="hidden get_user_id" value="{{ $user->user_id }}">
        <div class="flex justify-end">
            <button type="button"
                class="update_profile text-white bg-[#3AB86D] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Simpan</button>
                <a href="{{ route('detail.profile') }}" type="button"
                class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Batal</a>
        </div>
    </div>
</div>
