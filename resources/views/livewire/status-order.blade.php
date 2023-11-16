<div>
    <div class="flex gap-6 p-4 mb-6">
        <div class="w-full">
            <form>
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="default-search" wire:model="search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                        placeholder="Search orders" required>
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-[#3AB86D] hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="flex justify-center mb-6">
        <div class="flex gap-8">
            <div class="h-4">
            <button wire:click="$set('status', 0)"
                class="{{ ($status == 0) ? "border-b-4 text-green-500 border-green-500" : "text-black"}}  font-bold text-black-500 hover:text-green-700 hover:border-green-700 hover:border-b-4">
                <h2 class="text-base font-medium">Proses antrian</h2>
            </button>
            </div>
            <div class="h-4">
                <button wire:click="$set('status', 1)"
                class="{{ ($status == 1) ? "border-b-4 text-green-500 border-green-500" : "text-black"}}  font-bold text-black-500 hover:text-green-700 hover:border-green-700 hover:border-b-4">
            <h2 class="text-base font-medium">Proses Pengambilan</h2>
        </button>

        </div>
            <div class="h-4">
            <button  wire:click="$set('status', 2)"
            class="{{ ($status == 2) ? "border-b-4 text-green-500 border-green-500" : "text-black"}}  font-bold text-black-500 hover:text-green-700 hover:border-green-700 hover:border-b-4">
                <h2 class="text-base font-medium">Proses Pencucian</h2>
            </button>
        </div>
            <div class="h-4">
            <button  wire:click="$set('status', 3)"
            class="{{ ($status == 3) ? "border-b-4 text-green-500 border-green-500" : "text-black"}}  font-bold text-black-500 hover:text-green-700 hover:border-green-700 hover:border-b-4">
                <h2 class="text-base font-medium">Proses diantar</h2>
            </button>
        </div>
            <div class="h-4">
            <button  wire:click="$set('status', 4)"
            class="{{ ($status == 4) ? "border-b-4 text-green-500 border-green-500" : "text-black"}}  font-bold text-black-500 hover:text-green-700 hover:border-green-700 hover:border-b-4">
                <h2 class="text-base font-medium">Pesanan Selesai</h2>
            </button>
        </div>
        </div>
    </div>
    <div class="flex justify-center mt-8">
        <div class="flex-col items-center w-[90%] max-h-[651px] min-h-[651px] overflow-y-auto">
            @foreach ($listOrder as $order)
            <div class="flex items-center justify-between p-2 mb-4 bg-blue-200 rounded-lg">
                <div class="flex gap-10">
                    <h1 class="my-auto">{{ $order->order_id }}</h1>
                    <h1 class="my-auto">{{ $order->user->name ?? 'anonymous' }}</h1>
                    <h1 class="my-auto">{{ $order->address->address ?? 'anonymous' }}</h1>
                </div>
                <button type="button" id="open_modal" value="{{ $order->order_id }}"
                    class=" text-white bg-[#3AB86D] hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Detail</button>
                </div>
            @endforeach
        </div>
    </div>
    <div class="w-full pt-5 mr-2 border-t">
        {{ $listOrder->links('livewire.pagination-links') }}
    </div>

    {{-- status order modal--}}
    <div id="modal" class="fixed inset-0 z-40 hidden bg-gray-900 bg-opacity-50 modal dark:bg-opacity-80">
        <div tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full p-4 overflow-x-hidden overflow-y-auto">
            <div class="relative w-full max-w-[750px] flex justify-center items-center max-h-full min-h-[600px] h-full">
                <!-- Modal content -->
                <div class="relative bg-[#3AB86D]  rounded-[25px] shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex flex-col gap-3 p-5 dark:border-gray-600">
                        <div class="flex justify-between">
                            <h1 class="text-3xl text-white"><span class="font-bold">Detail pesanan</span></h1>
                            <button type="button" id="close_modal"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-[25px] text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <svg aria-hidden="true" class="w-5 h-5 fill-white" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="text-white">
                            <div class="flex flex-col gap-6">
                                <div class="flex flex-col gap-2 border-b-2">
                                    <h2>Nama : <span class="font-bold order_name" ></span></h2>
                                    <h2>No Hp : <span class="font-bold order_phone" ></span></h2>
                                    <h2>Alamat :</h2>
                                    <p class="font-bold order_address">asdoaishdoiahoidhasoih</p>
                                    <h2>Message :</h2>
                                    <p class="font-bold order_message">asudhaousdhouadhouasdhouashoh</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <h1 class="text-xl font-medium">Barang :</h1>
                                    <div class="border pl-2 flex flex-col list_item overflow-y-auto max-h-[110px]">
                                        {{-- list-order-status --}}
                                    </div>
                                    <input type="text" class="hidden text-black get_order_id">
                                    <input type="text" class="hidden text-black get_kurir_id">
                                    <div class="flex flex-col gap-2">
                                        <h1 class="text-xl font-bold">Total : <span class="total_harga"></span></h1>
                                        @if($status == 0)
                                        <div class="flex flex-col items-center justify-center">
                                        <div class="mb-3 text-red-600 save_error"></div>
                                        <div class="flex">
                                            <button class="assign_kurir text-[#3AB86D] hover:text-white bg-white hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm h-8 w-32 mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><span class="name_button"></span></button>
                                        <button class="choose_kurir text-[#3AB86D] hover:text-white bg-white hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm h-8 w-32 mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><span class="name_button_kurir"></span></button>
                                        </div>
                                    </div>
                                        @else
                                        <div class="flex items-center justify-center">
                                        <button class="btn_hidden mt-2 update_status text-[#3AB86D] hover:text-white bg-white hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm h-8 w-32 mr-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><span class="name_button"></span></button>
                                        <div class="flex flex-col items-center justify-center">
                                            @if($status == 4)
                                            <img src="{{ asset('checklist.svg') }}" alt="" class="w-16">
                                            @endif
                                            <h2 class="selesai"></h2>
                                        </div>
                                    </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end status order --}}

    {{-- choose kurir --}}
    <div id="kurir_modal" class="fixed inset-0 z-40 hidden bg-gray-900 bg-opacity-50 modal dark:bg-opacity-80">
        <div tabindex="-1"
            class="backdrop-filter backdrop-blur-[2px] fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full p-4 overflow-x-hidden overflow-y-auto">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-[25px] shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex flex-col gap-2 p-5 border-b dark:border-gray-600">
                        <div class="flex justify-between">
                            <h2 class="text-xl font-bold modal-label">
                               Pilih kurir
                            </h2>
                            <button type="button" id="close_kurir_modal"
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
                        <p class="text-sm">
                           Pilih kurir untuk pengambilan dan pengantaran pesanan
                    </div>
                    <!-- Modal body -->
                    <div class="pb-6 pt-6 px-6 space-y-6 overflow-y-auto max-h-[250px]">
                        @foreach ($listCourier as $courier)
                        <button type="button" value="{{ $courier->user_id }}" class="kurir block w-full p-6 mx-auto space-y-3 bg-white rounded-lg shadow-lg group ring-1 ring-slate-900/5 hover:bg-[#3AB86D] focus:bg-[#3AB86D] hover:ring-[#3AB86D]">
                            <div class="flex items-center space-x-3 text-left">
                                <img src="{{ asset('../avatar/'.$courier->avatar) }}" alt="" class="w-14">
                                <div>
                                <h1 class="text-sm font-semibold group-focus:text-white text-slate-900 group-hover:text-white">{{ $courier->name }}</h1>
                                <h1 class="text-sm text-slate-500 group-focus:text-white group-hover:text-white">In order : {{ $courier->pesanan_diambil }}</h1>
                                </div>
                            </div>
                          </button>
                        @endforeach
                        {{-- @if ($count < $totalKurir)
                        <span wire:loading class="col-span-4 font-bold text-center">Loading ...</span>
                        <button wire:click="loadmore" class="col-span-4 py-3 w-full rounded-[10px] text-center bg-[#3AB86D] text-white px-6">Load more</button>
                        @endif --}}
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end choose kurir --}}
</div>
