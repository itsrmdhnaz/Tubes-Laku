@extends('layouts.main')

@section('container')
@if(session('success'))
<!-- Main modal -->
<div tabindex="-1" aria-hidden="false" class="fixed inset-0 z-50 flex flex-col items-center justify-center gap-6 overflow-x-hidden overflow-y-auto">
    <div class="absolute inset-0 bg-opacity-50 backdrop-filter backdrop-blur-[2px]"></div>
    <div class="relative max-w-lg mx-auto bg-[#3AB86D] text-white rounded-[15px] shadow-lg min-w-[550px] p-8">
      <!-- Modal body -->
      <div class="p-6">
        <div class="flex flex-col gap-7">
        <h1 class="text-4xl text-center ">{{ session('success') }}!</h1>
        <img src="{{ asset('successOrder.svg') }}" alt="" class="mx-auto w-[20%]">
        <h2 class="text-2xl text-center">Silahkan menunggu, kami akan segera menerima pesanan anda.</h2>
    </div>
      </div>
    </div>
    <a href="{{ route('home') }}">
    <div class="relative flex gap-10 max-w-lg mx-auto bg-[#3AB86D] text-white rounded-[15px] shadow-lg min-w-[250px] p-3">
        <img src="{{ asset('image 13.svg') }}" alt="" class="w-12">
        <h1 class="my-auto text-2xl text-white">Home</h1>
    </div>
</a>
  </div>
@endif
<div id="small-modal" tabindex="-1"
class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative w-full max-w-lg max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-[25px] shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex flex-col gap-2 p-5 border-b dark:border-gray-600">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold">Memilih alamat</h2>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-[25px] text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="small-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <p class="text-sm">Memiliih alamat pesanan untuk order pesanan.</p>
        </div>
        <!-- Modal body -->
        <div class="px-6 space-y-3 py-4 overflow-y-auto max-h-[180px]">
            <h1>Alamat utama :</h1>
            <button type="button" data-modal-hide="small-modal"
                class="address-select-btn w-full bg-[#BBE6CD] rounded-[10px] min-h-[80px] flex flex-col justify-center items-center gap-2"
                data-address="{{ $address->address }}" data-address-id="{{ $address->address_id }}">
                <h1>{{ $address->address }}</h1>
                <h2 class="font-bold">{{ $address->phone }}</h2>
            </button>

            @if($addresses && count($addresses) > 0)
            <h1>Alamat anda :</h1>
            @foreach ($addresses as $address)
                <button type="button" data-modal-hide="small-modal"
                    class="address-select-btn w-full bg-[#BBE6CD] rounded-[10px] min-h-[80px] flex flex-col justify-center items-center gap-2"
                    data-address="{{ $address->address }}" data-address-id="{{ $address->address_id }}">
                    <h1>{{ $address->address }}</h1>
                    <h2 class="font-bold">{{ $address->phone }}</h2>
                </button>
            @endforeach
            @endif
        </div>
    </div>
</div>
</div>
    <div class="flex flex-col gap-4 px-8 py-3">
        <div class="font-weight-bold">
            <h2>Pilih alamat</h2>
        </div>

        <button data-modal-target="small-modal" data-modal-toggle="small-modal">
            <div class="w-full bg-[#BBE6CD] rounded-[10px] min-h-[90px]">
                <div class="flex gap-6">
                    <img src="{{ asset('address.svg') }}" alt="" class="w-[10%] py-2 ml-5">
                    <div class="flex flex-col gap-2 my-auto">
                        <div class="w-max">
                            <h2>Alamat rumah</h2>
                        </div>
                        <div>
                            <h2 id="selectedAddress">{{ $address->address }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </button>
    </div>

    <div class="flex flex-col gap-6 px-8 py-3">
        <div class="font-weight-bold">
            <h2>Atur waktu pengambilan</h2>
        </div>
        <div class="w-full bg-[#BBE6CD] rounded-[10px] min-h-[320px] flex flex-col">
            <div class="flex gap-6">
                <img src="{{ asset('tanggal.svg') }}" alt="" class="w-[15%] pt-4 ml-5">
                <div class="h-12 bg-white rounded-[10px] w-72 flex items-center justify-center mt-10">
                    <h2 class="text-lg text-center">Hari ini : {{ date('Y-m-d, l') }}</h2>
                </div>
            </div>
            <div class="flex gap-10">
                <img src="{{ asset('messageOrder.svg') }}" alt="" class="w-[12%] py-4 ml-6">
                <form id="orderForm" action="{{ route('order.storeTwo') }}" method="POST">
                    @csrf
                <div class="h-44  bg-white rounded-[10px] w-[500px] flex p-2">
                    <textarea name="message_order" id="" cols="60" rows="0" class="overflow-y-auto border-none resize-none" placeholder="Pesan deskripsi untuk pesanan disini ... "></textarea>
                    <input type="hidden" id="selectedAddressId" value="{{ $address->address_id }}"
                                name="address_id" class="min-w-[300%] p-0 bg-transparent border-none pointer-events-none">
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-6 px-8 py-3">
        <div class="font-weight-bold">
            <h2>Metode Pesanan</h2>
        </div>
        <div class="bg-[#BBE6CD] rounded-[10px] h-20 flex items-center justify-around">
                <input class="hidden" id="radio_1" type="radio" name="method_order" value="0" checked>
                <label class="w-32 p-4 my-auto text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer" for="radio_1">
                    Pickup
                </label>
                <input class="hidden" id="radio_2" type="radio" name="method_order" value="1" checked>
                <label class="w-32 p-4 text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer" for="radio_2">
                    Send
                </label>
                <input class="hidden" id="radio_3" type="radio" name="method_order" value="2" checked>
                <label class="w-40 p-4 text-sm text-center bg-white border-2 border-gray-400 rounded-lg cursor-pointer" for="radio_3">
                    Pickup & Send
                </label>
        </div>
    </div>
@endsection

@section('script')
<script>
    const addressButtons = document.querySelectorAll('.address-select-btn');
    const selectedAddress = document.getElementById('selectedAddress');
    const selectedAddressId = document.getElementById('selectedAddressId');

    addressButtons.forEach(button => {
        button.addEventListener('click', () => {
            const address = button.dataset.address;
            const addressId = button.dataset.addressId;

            selectedAddress.textContent = address;
            selectedAddressId.value = addressId;


        });
    });
</script>
@endsection
