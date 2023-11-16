<div id="modal" class="fixed inset-0 z-40 hidden bg-gray-900 bg-opacity-50 modal dark:bg-opacity-80">
    <div tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full p-4 overflow-x-hidden overflow-y-auto">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-[25px] shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex flex-col gap-2 p-5 border-b dark:border-gray-600">
                    <div class="flex justify-between">
                        <h2 class="text-xl font-bold modal-label">Edit User</h2>
                        <button type="button" id="closeModal"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-[25px] text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <p class="text-sm">Menambahkan kurir dan memberikan akses untuk masuk kurir</p>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6 overflow-y-auto max-h-[250px]">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="save_errorname"></div>
                        <label for="name" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                            ALAMAT
                            <input
                                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md phone"
                                type="text" name="name" />
                        </label>
                        <div class="save_errorname"></div>

                        <div class="save_errorname"></div>
                        <label for="address" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                            ALAMAT
                            <input
                                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md phone"
                                type="text" name="address" />
                        </label>
                        <div class="save_erroraddress"></div>
                        <label for="phone" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                            NO TELEPON
                            <input
                                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md phone"
                                type="number" name="phone" />
                        </label>
                        <div class="save_errorphone"></div>
                        <label for="email" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                            EMAIL
                            <input
                                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md email"
                                type="text" placeholder="" name="email" />
                        </label>
                        <div class="save_erroremail"></div>
                        <label for="password" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                            password
                            <input
                                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md email"
                                type="password" placeholder="" name="password" />
                        </label>
                        <div class="save_errorpassword"></div>
                        <label for="password_confirmation" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                            Password Confirmation
                            <input
                                class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md email"
                                type="password" placeholder="" name="password_confirmation" />
                        </label>
                        <div class="save_errorpassword_confirmation"></div>
                        <label for="gender" class="gender text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                            KELAMIN
                            <div class="flex justify-center gap-6">

                                <input class="hidden" id="radio_1" type="radio" name="gender" value="L"
                                    checked>
                                <label
                                    class="w-32 p-4 my-auto text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer"
                                    for="radio_1">
                                    Laki Laki
                                </label>
                                <input class="hidden" id="radio_2" type="radio" name="gender" value="P">
                                <label
                                    class="w-32 p-4 text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer"
                                    for="radio_2">
                                    Perempuan
                                </label>

                            </div>
                        </label>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit" id="closeModal"
                        class="add_user text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Tambah User</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
